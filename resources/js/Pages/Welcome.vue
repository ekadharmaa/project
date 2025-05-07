<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import WebLayout from "@/Layouts/WebLayout.vue";
import TemplateList from "@/Components/Template/TemplateList.vue";
import NavLink from "@/Components/NavLink.vue";
import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const props = defineProps({
    templates: Array,
});
</script>

<template>
    <Head title="Template Undangan Digital" />

    <WebLayout>
        <div class="bg-gray-900 py-20">
            <div class="max-w-7xl mx-auto px-5 md:px-20 lg:px-16">
                <div
                    class="grid md:grid-cols-2 lg:grid-cols-2 items-center gap-10"
                >
                    <div class="text-white space-y-4">
                        <h1
                            class="text-4xl md:text-2xl lg:text-4xl font-black leading-tight"
                        >
                            Undangan Kertas? Sudah Biasa! Waktunya Beralih ke
                            Undangan Digital yang Kekinian!
                        </h1>
                        <p class="text-lg md:text-base">
                            Kirimkan undangan cantik dan anti ribet dalam
                            hitungan menit
                        </p>

                        <NavLink href="/member/login">
                            <button
                                class="bg-white text-gray-900 hover:bg-gray-200 font-bold uppercase p-3 px-5 rounded-xl mt-5"
                            >
                                Daftar Sekarang !
                            </button>
                        </NavLink>
                    </div>
                    <div class="order-first md:order-none lg:order-none">
                        <img src="/assets/images/ui.png" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Template List -->
        <div class="max-w-7xl mx-auto py-12 px-2 md:px-5 lg:px-10">
            <div class="flex items-center justify-between mb-5">
                <h1 class="font-semibold text-2xl">Template Terlaris</h1>
                <NavLink
                    :href="`/template?category=all`"
                    class="px-5 py-1 bg-gray-300 rounded-full text-sm"
                >
                    Lihat Semua
                </NavLink>
            </div>

            <TemplateList :list="templates" />
        </div>

            <!-- <div class="p-6" id="app">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-pink-500">
                        Filter Instagram<span class="text-gray-800">
                            Sudah Tersedia</span
                        >
                    </h1>
                    <p class="text-gray-600 mt-2">
                        Lebih interaktif dan berbagi moment indah para tamu
                        undangan kalian!
                    </p>
                </div>
                <div
                    class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6"
                >
                    <div class="rounded-lg overflow-hidden">
                        <img
                            alt="Filter Wedding #30"
                            class="w-full"
                            height="500"
                            src="https://www.our-wedding.link/_ipx/w_250,f_webp/https://images.ctfassets.net/q40z6pfqje6o/lE9CTsUZZAHiW8xUdZT36/1494c87de6e75e935e3c58c41a4d89ea/filter_29__garden_.jpg"
                            width="300"
                        />
                        <div class="p-4 text-center">
                            <p class="text-gray-600">Filter Wedding #1</p>
                            <button
                                class="mt-2 bg-yellow-200 text-gray-800 py-2 px-4 rounded-full flex items-center justify-center mx-auto gap-2"
                            >
                                <svg
                                    viewBox="0 0 16 16"
                                    width="1em"
                                    height="1em"
                                    focusable="false"
                                    role="img"
                                    aria-label="instagram"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="bi-instagram"
                                >
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                    ></path>
                                </svg>
                                <span>Coba Filter</span>
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden">
                        <img
                            alt="Filter Wedding #30"
                            class="w-full"
                            height="500"
                            src="https://www.our-wedding.link/_ipx/w_250,f_webp/https://images.ctfassets.net/q40z6pfqje6o/1IFv3onaaYBSbILfzVoJzg/4ce9308f7f6bbb0a6383832a313f4104/filter_28__jawa_.jpg"
                            width="300"
                        />
                        <div class="p-4 text-center">
                            <p class="text-gray-600">Filter Wedding #2</p>
                            <button
                                class="mt-2 bg-yellow-200 text-gray-800 py-2 px-4 rounded-full flex items-center justify-center mx-auto gap-2"
                            >
                                <svg
                                    viewBox="0 0 16 16"
                                    width="1em"
                                    height="1em"
                                    focusable="false"
                                    role="img"
                                    aria-label="instagram"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="bi-instagram"
                                >
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                    ></path>
                                </svg>
                                <span>Coba Filter</span>
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden">
                        <img
                            alt="Filter Wedding #30"
                            class="w-full"
                            height="500"
                            src="https://www.our-wedding.link/_ipx/w_250,f_webp/https://images.ctfassets.net/q40z6pfqje6o/298uWxVqBS6POPFAQWjkGk/e936732ad3f51da8f08eba0589dfd3a4/filter_27__1_.png"
                            width="300"
                        />
                        <div class="p-4 text-center">
                            <p class="text-gray-600">Filter Wedding #3</p>
                            <button
                                class="mt-2 bg-yellow-200 text-gray-800 py-2 px-4 rounded-full flex items-center justify-center mx-auto gap-2"
                            >
                                <svg
                                    viewBox="0 0 16 16"
                                    width="1em"
                                    height="1em"
                                    focusable="false"
                                    role="img"
                                    aria-label="instagram"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="bi-instagram"
                                >
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                    ></path>
                                </svg>
                                <span>Coba Filter</span>
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden">
                        <img
                            alt="Filter Wedding #30"
                            class="w-full"
                            height="500"
                            src="https://www.our-wedding.link/_ipx/w_250,f_webp/https://images.ctfassets.net/q40z6pfqje6o/5tth0bzqXXSNJdZxAYHEz6/731baa5b199e1f3e64e957b68fbe54df/filter_25__2_.png"
                            width="300"
                        />
                        <div class="p-4 text-center">
                            <p class="text-gray-600">Filter Wedding #4</p>
                            <button
                                class="mt-2 bg-yellow-200 text-gray-800 py-2 px-4 rounded-full flex items-center justify-center mx-auto gap-2"
                            >
                                <svg
                                    viewBox="0 0 16 16"
                                    width="1em"
                                    height="1em"
                                    focusable="false"
                                    role="img"
                                    aria-label="instagram"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="bi-instagram"
                                >
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                    ></path>
                                </svg>
                                <span>Coba Filter</span>
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden">
                        <img
                            alt="Filter Wedding #30"
                            class="w-full"
                            height="500"
                            src="https://www.our-wedding.link/_ipx/w_250,f_webp/https://images.ctfassets.net/q40z6pfqje6o/6HLwOpHIAdncY4RmBKUfLn/b4227157244f13e663dea6a3a618e517/filter_27__minang_.jpg"
                            width="300"
                        />
                        <div class="p-4 text-center">
                            <p class="text-gray-600">Filter Wedding #5</p>
                            <button
                                class="mt-2 bg-yellow-200 text-gray-800 py-2 px-4 rounded-full flex items-center justify-center mx-auto gap-2"
                            >
                                <svg
                                    viewBox="0 0 16 16"
                                    width="1em"
                                    height="1em"
                                    focusable="false"
                                    role="img"
                                    aria-label="instagram"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    class="bi-instagram"
                                >
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                    ></path>
                                </svg>
                                <span>Coba Filter</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-8">
                    <button
                        class="bg-gray-900 text-white py-2 px-6 rounded-full"
                    >
                        Lihat Lebih Banyak Filter Instagram
                    </button>
                </div>
            </div> -->

            <div class="bg-white py-20">
                <div class="max-w-7xl mx-auto py-12 px-2 md:px-5 lg:px-10">
                    <div
                        class="grid md:grid-cols-2 lg:grid-cols-2 items-center gap-10"
                    >
                        <div class="order-first md:order-none lg:order-none">
                            <img src="/assets/images/feature.png" />
                        </div>
                        <div class="text-slate-800 space-y-4">
                            <h1
                                class="text-4xl md:text-2xl lg:text-4xl font-black leading-tight"
                            >
                                Undangan Digital Terbaik dengan Fitur-Fitur
                                Lengkap
                            </h1>
                            <p class="text-lg md:text-base">
                                Buat undangan digital yang unik dan personal
                                dengan pilihan fitur lengkap yang dapat kamu
                                sesuaikan sesuai keinginan dan kebutuhanmu.
                            </p>
                            <ul class="grid md:grid-cols-2 gap-2">
                                <li>✅ Custom Nama Tamu Undangan</li>
                                <li>✅ Custom Musik Latar</li>
                                <li>✅ Beragam Tema</li>
                                <li>✅ Form RSVP &amp; Ucapan</li>
                                <li>✅ Amplop Digital &amp; Tanda Kasih</li>
                                <li>✅ Hitung Mundur Waktu Acara</li>
                                <li>✅ Integrasi Google Maps</li>
                                <li>✅ Galeri Foto</li>
                                <li>✅ Edit Gampang Cukup Pake HP</li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>

        <div class="bg-gray-900 py-20">
            <div class="max-w-7xl mx-auto py-12 px-2 md:px-5 lg:px-10">
                <div class="text-center space-y-4">
                    <h1
                        class="text-4xl md:text-2xl lg:text-4xl font-black text-white leading-tight"
                    >
                        3 Langkah Mudah Membuat Undangan Digital di Balicreative
                    </h1>
                    <p class="text-lg md:text-base text-white">
                        Aplikasi undangan digital berbasis website yang
                        dirancang khusus agar mudah digunakan. Cukup ikuti 3
                        langkah sederhana untuk menciptakan undangan website
                        impianmu.
                    </p>
                </div>
                <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-10 mt-10">
                    <div class="text-white space-y-4 p-5 border rounded">
                        <h1
                            class="text-4xl md:text-2xl lg:text-4xl font-black leading-tight text-yellow-600"
                        >
                            1. Pilih Tema
                        </h1>
                        <p class="text-lg md:text-base">
                            Jelajahi berbagai pilihan tema undangan di website
                            kami dan pilih salah satu dari ratusan template yang
                            kreatif dan sesuai dengan selera.
                        </p>
                    </div>
                    <div class="text-white space-y-4 p-5 border rounded">
                        <h1
                            class="text-4xl md:text-2xl lg:text-4xl font-black leading-tight text-yellow-600"
                        >
                            2. Edit Undangan
                        </h1>
                        <p class="text-lg md:text-base">
                            Sesuaikan tema undanganmu menggunakan smart editor
                            Satu Momen. Dalam beberapa langkah mudah, kamu akan
                            mendapatkan desain yang sempurna!
                        </p>
                    </div>
                    <div class="text-white space-y-4 p-5 border rounded">
                        <h1
                            class="text-4xl md:text-2xl lg:text-4xl font-black leading-tight text-yellow-600"
                        >
                            3. Kirim dan Pantau
                        </h1>
                        <p class="text-lg md:text-base">
                            Undangan online yang telah kamu buat siap dibagikan
                            kepada para tamu. Siapkan diri untuk membuat semua
                            orang terpesona!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="shrink-0 flex items-center">
                    <Link :href="route('web.index')">
                        <ApplicationLogo
                            class="block h-9 w-auto fill-current text-gray-800"
                        />
                    </Link>
                </div>

                <ul
                    class="flex flex-wrap items-center mb-6 mt-5 text-sm font-medium text-gray-500 sm:mb-0"
                >
                    <li>
                        <a
                            href="https://wa.me/628999400874"
                            target="_blank"
                            class="hover:underline me-4 md:me-6"
                            >About</a
                        >
                    </li>
                    <li>
                        <a
                            href="https://wa.me/628999400874"
                            target="_blank"
                            class="hover:underline me-4 md:me-6"
                            >Privacy Policy</a
                        >
                    </li>
                    <li>
                        <a
                            href="https://wa.me/628999400874"
                            target="_blank"
                            class="hover:underline me-4 md:me-6"
                            >Licensing</a
                        >
                    </li>
                    <li>
                        <a
                            href="https://wa.me/628999400874"
                            target="_blank"
                            class="hover:underline"
                            >Contact</a
                        >
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center"
                >© 2025 <a href="#" class="hover:underline">BaliCreative™</a>. All
                RightsReserved.</span
            >
        </div>

        <!-- End Template List -->
    </WebLayout>
</template>
