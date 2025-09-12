<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PokerTable from '@/components/poker-suite/PokerTable.vue';
import { useGame } from '@/composables/useGame';

const { game, gameState } = defineProps({game: Object, gameState: Object});
const { seatOrder, players } = useGame(gameState);

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Games',
        href: '/games',
    },
    {
        title: 'Game #' + game.id,
        href: '/games/' + game.id,
    },
];
</script>
<template>
    <Head title="Show Game" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto poker-floor">
            <PokerTable :seatOrder :players />
        </div>
    </AppLayout>
</template>
