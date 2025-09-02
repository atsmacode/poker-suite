<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useGameSetup } from '@/composables/useGameSetup';
import SelectSeatCount from '@/components/poker-suite/SelectSeatCount.vue';
import PokerTable from '@/components/poker-suite/PokerTable.vue';

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
    tableSeatCount,
    seatOrder,
    setupGame,
    setToken,
    setRoute
} = useGameSetup();

setToken(token ?? '');
setRoute(route('scenarios.setup'));
setupGame();

</script>
<template>
    <Head title="Create Scenario" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="rounded-xl m-4 p-4 border rounded-xl">
            <form>
                <SelectSeatCount @seats-changed="(n: number) => tableSeatCount = n" />
            </form>
        </div>

        <div class="flex flex-row gap-4 h-full mx-4">
            <div class="gap-4 basis-2/3">
                <PokerTable :seatOrder />
            </div>
            <div class="basis-1/3 p-4 border rounded-xl h-full">
                <div class="mb-10">
                    <p class="border-b mb-2 text-xl">Poker Calculations</p>
                    <ul>
                        <li>Pot Odds</li>
                        <li>Outs</li>
                        <li>...</li>
                    </ul>
                </div>

                <div>
                    <p class="border-b mb-2 text-xl">AI Overview</p>
                    <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis.</p>
                    <p>Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas.</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>