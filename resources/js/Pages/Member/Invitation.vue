<script setup lang="ts">
import { Head, router } from "@inertiajs/vue3";
import WebLayout from "@/Layouts/WebLayout.vue";
import Edit from "./Partials/Edit.vue";
import AddGuest from "./Partials/AddGuest.vue";
import type { Invitation, Guest } from "@/types/index";
import type { PropType } from "vue";
import { Icon } from "@iconify/vue";
import { ref, computed, onMounted } from "vue";
import { toast } from "vue3-toastify";

const props = defineProps({
    invitation: Object,
    guests: {
        type: Array as PropType<Guest[]>,
        required: true,
        default: () => [],
    },
    template: Object,
    sessionResponse: Object,
});

const attendanceStatus = {
    pending: "Menunggu Konfirmasi",
    yes: "Hadir",
    no: "Tidak Hadir",
};

const attendanceClass = {
    yes: "bg-gray-900 py-1 px-3 rounded-full text-white text-sm",
    pending: "bg-gray-300 py-1 px-3 rounded-full text-sm",
    no: "bg-red-500 py-1 px-3 rounded-full text-sm text-white",
};

const invitationStatus = {
    pending: "py-1 px-3 bg-yellow-300 rounded-full text-sm uppercase",
    success: "py-1 px-3 bg-green-100 rounded-full text-sm uppercase",
    expired: "py-1 px-3 bg-red-100 rounded-full text-sm uppercase",
};

const activeTab = ref("guests");
const isAddGuest = ref(false);
const wish = computed(() =>
    props.guests.filter((guest) => guest.wish !== null)
);

const customDomain = ref("");

const changeTab = (tab: string) => {
    activeTab.value = tab;
};

const deleteGuest = (id: number) => {
    router.delete(`/member/invitation/guests/${id}`, {
        onBefore: () => confirm("Apakah kamu yakin ingin menghapus tamu ini?"),
        onSuccess: () => {
            toast.success("Tamu berhasil dihapus");
        },
    });
};

const copyLink = (name: string) => {
    const link = (window.location.href + "?for=" + name).replace(
        "member/invitation",
        "undangan"
    );

    console.log("Generated Link:", link);

    const tempInput = document.createElement("input");
    tempInput.value = link;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    toast.success("Link berhasil disalin");
};

// const copyLink = (name: string) => {
//     const link = (window.location.href + "?for=" + name).replace(
//         "member/invitation",
//         "undangan"
//     );

//     navigator.clipboard.writeText(link);
//     toast.success("Link berhasil disalin");
// };

const attendGuest = computed(() => {
    return props.guests.filter((guest) => guest.attendance === "yes");
});

const notAttendGuest = computed(() => {
    return props.guests.filter((guest) => guest.attendance === "no");
});

const pendingGuest = computed(() => {
    return props.guests.filter((guest) => guest.attendance === "pending");
});

onMounted(() => {
    if (props.sessionResponse) {
        router.post(route("web.resetSession"));
    }
});
</script>

<template>
    <Head title="Member Area" />

    <WebLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div
                            class="flex flex-col gap-y-5 lg:gap-y-0 lg:flex-row justify-between items-start border-b pb-3"
                        >
                            <div>
                                <h1 class="text-lg font-bold mb-1">
                                    {{ invitation.order_id }}

                                    <span
                                        class="ml-1"
                                        :class="
                                            invitation &&
                                            invitation.status === 'pending'
                                                ? invitationStatus.pending
                                                : invitationStatus.success
                                        "
                                    >
                                        {{
                                            invitation.status == "success"
                                                ? "active"
                                                : invitation.status
                                        }}
                                    </span>
                                </h1>

                                <!-- Template Information -->
                                <div>
                                    <div class="text-sm text-gray-500">
                                        <span class="font-semibold"
                                            >Nama Template:</span
                                        >
                                        {{ template.name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <span class="font-semibold"
                                            >Kategori:</span
                                        >
                                        {{ template.category }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button
                                    class="p-2 rounded-full px-5 text-sm hover:bg-gray-400"
                                    @click="changeTab('guests')"
                                    :class="{
                                        'bg-gray-900 text-white':
                                            activeTab === 'guests',
                                        'bg-gray-200': activeTab !== 'guests',
                                    }"
                                >
                                    Daftar Tamu
                                </button>
                                <button
                                    class="p-2 rounded-full px-5 text-sm hover:bg-gray-400"
                                    @click="changeTab('wishes')"
                                    :class="{
                                        'bg-gray-900 text-white':
                                            activeTab === 'wishes',
                                        'bg-gray-200': activeTab !== 'wishes',
                                    }"
                                >
                                    Ucapan
                                </button>
                                <button
                                    class="p-2 rounded-full px-5 text-sm hover:bg-gray-400"
                                    @click="changeTab('edit')"
                                    :class="{
                                        'bg-gray-900 text-white':
                                            activeTab === 'edit',
                                        'bg-gray-200': activeTab !== 'edit',
                                    }"
                                >
                                    Edit
                                </button>
                            </div>
                        </div>

                        <div v-if="activeTab === 'guests'">
                            <div
                                class="grid md:grid-cols-2 lg:grid-cols-4 my-3 gap-5"
                            >
                                <div
                                    class="bg-gray-900 rounded-lg p-5 text-white flex text-5xl justify-between items-end"
                                >
                                    <Icon icon="mdi:account" />

                                    <div class="flex flex-col items-end">
                                        {{ guests.length }}
                                        <span class="text-base">Tamu</span>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="bg-gray-900 rounded-lg p-5 text-white flex text-5xl justify-between items-end"
                                    >
                                        <Icon icon="mdi:check" />

                                        <div class="flex flex-col items-end">
                                            {{ attendGuest.length }}
                                            <span class="text-base">Hadir</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="bg-gray-900 rounded-lg p-5 text-white flex text-5xl justify-between items-end"
                                    >
                                        <Icon icon="mdi:close" />

                                        <div class="flex flex-col items-end">
                                            {{ notAttendGuest.length }}
                                            <span class="text-base"
                                                >Tidak Hadir</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="bg-gray-900 rounded-lg p-5 text-white flex text-5xl justify-between items-end"
                                    >
                                        <Icon icon="mdi:clock" />

                                        <div class="flex flex-col items-end">
                                            {{ pendingGuest.length }}
                                            <span class="text-base"
                                                >Menunggu</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="my-5 pb-3 border-b flex justify-between items-center"
                            >
                                <h3 class="font-semibold text-lg">
                                    Daftar Tamu
                                </h3>

                                <div>
                                    <button
                                        type="button"
                                        class="bg-blue-500 hover:bg-gray-700 text-white rounded-lg py-2 px-5 text-sm"
                                        @click="isAddGuest = !isAddGuest"
                                    >
                                        Tambah Tamu
                                    </button>
                                </div>
                            </div>

                            <div>
                                <AddGuest
                                    v-if="isAddGuest"
                                    :invitation="invitation"
                                    :guests="guests"
                                />
                            </div>

                            <div>
                                <div
                                    class="border-b py-3 text-sm text-gray-500 grid grid-cols-12 gap-2"
                                >
                                    <div class="col-span-2">Nama</div>
                                    <div class="col-span-2">Status</div>
                                    <div class="col-span-4">Aksi</div>
                                </div>

                                <div
                                    class="grid grid-cols-12 gap-2 py-4 border-b"
                                    v-for="guest in guests"
                                    :key="guest.id"
                                >
                                    <div class="col-span-2">
                                        {{ guest.name }}
                                    </div>
                                    <div class="col-span-2">
                                        <span
                                            :class="
                                                attendanceClass[
                                                    guest.attendance
                                                ]
                                            "
                                            class="text-xs"
                                            >{{
                                                attendanceStatus[
                                                    guest.attendance
                                                ]
                                            }}</span
                                        >
                                    </div>
                                    <div
                                        class="flex flex-col lg:flex-row gap-2"
                                    >
                                        <button
                                            type="button"
                                            class="bg-red-500 h-10 hover:bg-red-700 text-white rounded-lg py-1 px-3 text-sm flex items-center gap-1"
                                            @click="deleteGuest(guest.id)"
                                        >
                                            <Icon icon="mdi:delete" />
                                            Hapus
                                        </button>
                                        <!-- <button
                                            type="button"
                                            class="bg-green-600 h-10 hover:bg-green-700 text-white rounded-lg py-1 px-3 text-sm flex items-center gap-1"
                                            @click="sendMessage(guest.name)"
                                        >
                                            <Icon icon="ic:baseline-whatsapp" />
                                            Kirim
                                        </button> -->
                                        <button
                                            type="button"
                                            class="bg-green-500 h-10 hover:bg-gray-700 text-white rounded-lg py-1 px-3 text-sm flex items-center gap-1"
                                            @click="copyLink(guest.name)"
                                        >
                                            <Icon icon="mdi:content-copy" />
                                            Copy Link Undangan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'wishes'">
                            <div
                                v-if="wish.length"
                                class="border-b py-3 text-sm text-gray-500 grid grid-cols-12 gap-2"
                            >
                                <div class="col-span-2">Nama</div>
                                <div class="col-span-2">Pesan</div>
                            </div>
                            <div
                                v-for="guest in wish"
                                :key="guest.id"
                                class="grid grid-cols-12 gap-2 py-4 border-b"
                            >
                                <div class="col-span-2">{{ guest.name }}</div>
                                <div class="col-span-2">{{ guest.wish }}</div>
                            </div>
                        </div>

                        <div v-if="activeTab === 'edit'">
                            <Edit :invitation="invitation" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </WebLayout>
</template>

<style scoped lang="scss">
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

th {
    text-align: left;
    background-color: #18191d;
    color: white;
}

td {
    text-align: left;
}

// set whitespace
td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
