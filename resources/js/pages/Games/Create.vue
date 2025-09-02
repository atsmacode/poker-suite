<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import SelectSeatCount from '@/components/poker-suite/SelectSeatCount.vue';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Game',
        href: '/games',
    },
    {
        title: 'Create Game',
        href: '/games/create',
    },
];

const { token } = defineProps({token: String});

const {
    tableSeatCount,
    setupRequest
} = useGameSetup();

const submitForm = () => {
    return router.post(route('games.store'), setupRequest.value);
};
</script>
<template>
    <Head title="Create Game" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="rounded-xl m-4 p-4 border rounded-xl">
            <form @submit.prevent="submitForm">
                <SelectSeatCount @seats-changed="(n: number) => tableSeatCount = n" />
                <button type="submit">Save</button>
            </form>
        </div>
    </AppLayout>
</template>