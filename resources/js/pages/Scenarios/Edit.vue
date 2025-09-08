<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import Scenario from '@/components/poker-suite/Scenario.vue';

const { scenario, gameState } = defineProps({scenario: Object, gameState: Object});

const {
    seatOrder,
    setRoute
} = useGameSetup(gameState);

setRoute(route('scenarios.setup'));

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Scenarios',
        href: '/scenarios',
    },
    {
        title: scenario.name,
        href: '/scenarios/' + scenario.id,
    },
];
</script>
<template>
    <Head title="View Scenario" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Scenario :seatOrder />
    </AppLayout>
</template>