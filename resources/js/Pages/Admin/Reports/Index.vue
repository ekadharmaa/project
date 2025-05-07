<script setup lang="ts">
import { ref, onMounted } from "vue";
import { Chart, registerables } from "chart.js";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, usePage } from "@inertiajs/vue3";

// Register Chart.js modules
Chart.register(...registerables);

const page = usePage();

// Data from Laravel
const orderStatusData = page.props.orderStatusData || {};
const monthlySales = page.props.monthlySales || {};

// Chart references
const statusChartRef = ref<HTMLCanvasElement | null>(null);
const salesChartRef = ref<HTMLCanvasElement | null>(null);

// Data transformation for order status
const statusLabels = Object.keys(orderStatusData);
const statusCounts = Object.values(orderStatusData);

// Buat mapping warna berdasarkan label status
const statusColors = statusLabels.map((label) => {
    const lowerLabel = label.toLowerCase();
    if (lowerLabel === "expired") return "#f87171"; // Merah
    if (lowerLabel === "success") return "#34d399"; // Hijau
    if (lowerLabel === "pending") return "#fbbf24"; // Kuning
    return "#ccc"; // Default color jika label tidak sesuai
});

// Data transformation for monthly sales
const salesLabels = Object.keys(monthlySales);
const salesTotals = Object.values(monthlySales);

onMounted(() => {
    if (statusChartRef.value) {
        new Chart(statusChartRef.value, {
            type: "pie",
            data: {
                labels: statusLabels,
                datasets: [
                    {
                        label: "Jumlah Pesanan",
                        data: statusCounts,
                        backgroundColor: statusColors,
                    },
                ],
            },
        });
    }

    if (salesChartRef.value) {
        new Chart(salesChartRef.value, {
            type: "line",
            data: {
                labels: salesLabels,
                datasets: [
                    {
                        label: "Total Transaksi (Rp)",
                        data: salesTotals,
                        borderColor: "#6366f1",
                        backgroundColor: "rgba(99, 102, 241, 0.2)",
                        fill: true,
                        tension: 0.3,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }
});
</script>

<template>
    <Head title="Laporan" />
    <AuthenticatedLayout>
        <div class="p-6 bg-white shadow rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Laporan Pesanan</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Chart Status Pesanan -->
                <div class="bg-gray-100 p-5 rounded-lg">
                    <h3 class="text-lg font-medium mb-2">Status Pesanan</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Grafik ini menunjukkan jumlah pesanan berdasarkan status
                        terkini.
                    </p>
                    <canvas ref="statusChartRef"></canvas>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">
                            Status yang tercatat dapat mencakup "Pending",
                            "Success", atau "Expired".
                        </p>
                    </div>
                </div>

                <!-- Chart Total Transaksi Bulanan -->
                <div class="bg-gray-100 p-5 rounded-lg">
                    <h3 class="text-lg font-medium mb-2">
                        Total Transaksi Bulanan
                    </h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Grafik ini menampilkan total transaksi yang terjadi
                        setiap bulan.
                    </p>
                    <canvas ref="salesChartRef"></canvas>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">
                            Laporan ini memberikan wawasan terkait pendapatan
                            bulanan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
