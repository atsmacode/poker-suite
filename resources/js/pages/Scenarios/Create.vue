<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import Scenario from '@/components/poker-suite/Scenario.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Scenarios',
        href: '/scenarios',
    },
    {
        title: 'Create Scenario',
        href: '/scenarios/create',
    },
];

const { token } = defineProps({token: String});

const {
    seatOrder,
    setupScenario,
    setToken,
    setRoute,
    setForScenario
} = useGameSetup();

setToken(token ?? '');
setRoute(route('scenarios.setup'));
setForScenario();
setupScenario();
</script>
<template>
    <Head title="Create Scenario" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Scenario :seatOrder />
    </AppLayout>
</template>