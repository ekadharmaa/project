<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebSettingController extends Controller
{
    public function edit()
    {
        $settings = WebSetting::first(); // Ambil data pengaturan pertama

        // Jika tidak ada data di database, set app_name dari .env
        if (!$settings) {
            $settings = new WebSetting();
            $settings->app_name = env('APP_NAME', 'Default App Name'); // Ambil dari .env jika kosong
            $settings->logo = null; // Jika tidak ada logo
        }

        return Inertia::render('Admin/WebSettings/Edit', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi logo
        ]);

        $settings = WebSetting::firstOrNew([]);
        $settings->app_name = $request->app_name;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $settings->logo = $logoPath;
        }

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
