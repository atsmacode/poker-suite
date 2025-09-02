<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import Scenario from '@/components/poker-suite/Scenario.vue';

const { scenario, gameState } = defineProps({scenario: Object, gameState: Object});

const {
    tableSeatCount,
    seatOrder,
    setSeats,
    setRoute,
    setForScenario
} = useGameSetup();

setRoute(route('scenarios.setup'));
setSeats(gameState.data.seats);
setForScenario(gameState.data.scenario.id);

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
        <Scenario :selectedSeatCount="gameState.data.seats.length" :seatOrder @seats-changed="(n: number) => tableSeatCount = n" />
    </AppLayout>
</template>