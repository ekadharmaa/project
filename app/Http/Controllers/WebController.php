<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\PaymentHelper;
use App\Helpers\TemplateHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CheckoutRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WebController extends Controller
{
    public function index()
    {
        $templates_list = TemplateHelper::list();

        return Inertia::render('Welcome', [
            'user' => Auth::guard('member')->user(),
            'templates' => $templates_list,
        ]);
    }

    public function showCheckout(Request $request)
    {
        $template_name = $request->get('template');
        $templates_list = json_decode(file_get_contents(resource_path('js/data/templates.json')), true);

        $template = collect($templates_list)->firstWhere('slug', $template_name);

        if (!$template) {
            abort(404);
        }

        return Inertia::render('Checkout', [
            'template' => $template,
        ]);
    }

    public function checkout(CheckoutRequest $request)
    {

        $data = $request->validated();
        try {
            DB::beginTransaction();

            $checkGuard = Auth::guard('member')->check();

            $customer = $checkGuard ? Auth::guard('member')->user() : Customer::where('email', $data['email'])->first();

            if (!$checkGuard && $customer) {
                throw new \Exception('Email already exists, please login or use another email');
            }

            // create customer if not exists
            if (!$customer) {
                $customerData = [
                    'name' => $data['name'],
                    'email' => $data['email'],
                ];

                if (!$checkGuard) {
                    $customerData['phone'] = $data['phone'];
                    $customerData['password'] = Hash::make($data['password']);
                }

                $customer = Customer::create($customerData);
            }

            // create order
            $order = $customer->orders()->create([
                'total' => $data['total'],
                'status' => $data['total'] == 0 ? 'success' : 'pending',
            ]);

            // create invitation
            $customer->invitations()->create([
                'order_id' => $order->id,
                'template' => $data['template'],
            ]);

            DB::commit();

            if ($order->total > 0) {
                $payments = [
                    'transaction_details' => array(
                        'order_id' => $order->order_id,
                        'gross_amount' => $order->total,
                    ),
                    'customer_details' => array(
                        'first_name' => $customer->name,
                        'email' => $customer->email,
                        'phone' => $customer->phone,
                    ),
                    'item_details' => array(
                        array(
                            'id' => $order->order_id,
                            'price' => $order->total,
                            'quantity' => 1,
                            'name' => 'Undangan Online',
                        ),
                    ),
                ];

                $token = PaymentHelper::midtransToken($payments);
                $order->update([
                    'payment_token' => $token,
                ]);
            }

            if ($checkGuard) {
                return redirect()->route('member.dashboard')->with([
                    'message' => 'Checkout success',
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                'message' =>  $th->getMessage(),
            ]);
        }

        return redirect()->route('web.index')->with([
            'message' => 'Checkout success',
        ]);
    }

    public function showTemplate(Request $request)
    {
        $category = $request->get('category');

        $templates_list = json_decode(file_get_contents(resource_path('js/data/templates.json')), true);
        $template_category = array_column($templates_list, 'category', 'category_slug');

        if ($category && $category !== 'all') {
            $templates_list = array_filter($templates_list, function ($template) use ($category) {
                return $template['category_slug'] == $category;
            });
        }

        return Inertia::render('Template', [
            'templates' => $templates_list,
            'categories' => array_unique($template_category),
        ]);
    }

    public function showPrice()
    {
        return Inertia::render('Price');
    }

    public function showTutorial()
    {
        throw new HttpException(503, 'Service Unavailable');
    }

    public function resetSession()
    {
        session()->forget('response');
        return redirect()->back();
    }
}
