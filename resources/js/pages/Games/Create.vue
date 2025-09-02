<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import SelectSeatCount from '@/components/poker-suite/SelectSeatCount.vue';

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
</script>
<template>
    <Head title="Create Game" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="rounded-xl m-4 p-4 border rounded-xl">
            <form>
                <SelectSeatCount @seats-changed="(n: number) => tableSeatCount = n" />
            </form>
        </div>
    </AppLayout>
</template>