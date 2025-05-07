<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    settings: {
        type: Object,
        default: () => ({}), // Gunakan objek kosong jika tidak ada data
    },
});

// Gunakan useForm untuk menangani form submission dan binding nilai langsung
const form = useForm({
    app_name: props.settings?.app_name || import.meta.env.VITE_APP_NAME, // Langsung ambil dari props.settings
    logo: null,
});

const submit = () => {
    form.post(route("web-settings.update"), {
        onSuccess: () => {
            form.reset("logo");
            // Update logoPath secara langsung dengan logo baru setelah berhasil disimpan
            props.settings.logo = form.logo
                ? `/storage/${form.logo.name}`
                : props.settings.logo;
        },
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <template #default>
            <div class="max-w-4xl mx-auto mt-8 p-4 bg-white shadow rounded-lg">
                <h1 class="text-2xl font-bold mb-6">Edit Web Settings</h1>

                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <!-- App Name -->
                    <div>
                        <InputLabel for="app_name" value="App Name" />
                        <TextInput
                            id="app_name"
                            v-model="form.app_name"
                            type="text"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.app_name"
                        />
                    </div>

                    <!-- Logo -->
                    <div class="mt-4">
                        <InputLabel for="logo" value="Logo" />
                        <input
                            type="file"
                            id="logo"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            @change="(e) => (form.logo = e.target.files[0])"
                        />
                        <InputError class="mt-2" :message="form.errors.logo" />

                        <!-- Show current logo -->
                        <div v-if="props.settings?.logo" class="mt-3">
                            <img
                                :src="`/storage/${props.settings.logo}`"
                                alt="Logo"
                                class="h-16 rounded-md"
                            />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <PrimaryButton :disabled="form.processing">
                            Save Changes
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
