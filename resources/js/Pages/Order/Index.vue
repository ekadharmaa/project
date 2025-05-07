<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DataTable from "@/Components/DataTable.vue";
import { Head, router } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";

const props = defineProps({
    orders: Object,
    sortFields: Array<string>,
});

const options = {
    title: "Invitation Orders",
    // addUrl: "/orders/add",
    headers: [
        "order_id",
        "name",
        "email",
        "phone",
        "status",
        "created_at",
        "total",
    ],
    customHeaders: {
        order_id: "Order ID",
        created_at: "Order Date",
    },
    sortFields: props.sortFields,
    actions: [
        {
            label: "Edit",
            icon: "octicon:pencil-16",
            onClick: (row: any) => {
                router.visit(route("orders.edit", { id: row.id }));
            },
        },
        {
            label: "Delete",
            icon: "octicon:trash-16",
            onClick: (row: any) => {
                router.visit(route("orders.destroy", { id: row.id }), {
                    onBefore: () => {
                        confirm("Are you sure you want to delete this order?");
                    },
                    method: "delete",
                    onSuccess: (e) => {
                        toast.success("Order deleted successfully");
                    },
                    onError: (errors) => {
                        toast.error(errors.message);
                    },
                });
            },
        },
    ],
};

const pagination = {
    total: props.orders.total,
    perPage: props.orders.per_page,
    currentPage: props.orders.current_page,
    lastPage: props.orders.last_page,
    firstPageUrl: props.orders.first_page_url,
    lastPageUrl: props.orders.last_page_url,
    nextPageUrl: props.orders.next_page_url,
    prevPageUrl: props.orders.prev_page_url,
};
</script>

<template>
    <Head title="Orders" />

    <AuthenticatedLayout>
        <template #header>
            <h2>Orders</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <DataTable
                        title="Invitation Orders"
                        :data="orders.data"
                        :options="options"
                        :pagination="pagination"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
