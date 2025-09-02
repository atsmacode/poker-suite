<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import Scenario from '@/components/poker-suite/Scenario.vue';

const { scenario, gameState } = defineProps({scenario: Object, gameState: Object});

const {
    seatOrder,
    setSeats,
    setRoute,
    setForScenario,
    setSeatCount,
    setGameId
} = useGameSetup();

setRoute(route('scenarios.setup'));
setSeats(gameState.data.seats);
setForScenario(gameState.data.scenario.id);
setGameId(gameState.data.id);

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
        <Scenario
            :selectedSeatCount="gameState.data.seats.length"
            :seatOrder
            @seats-changed="setSeatCount"
        />
    </AppLayout>
</template>