<script setup>
import GameSidePanel from './GameSidePanel.vue';
import PokerTable from './PokerTable.vue';
import SelectSeatCount from './SelectSeatCount.vue';
import { watch, ref } from 'vue';

const { seatOrder, selectedSeatCount } = defineProps({seatOrder: Object, selectedSeatCount: Number});
const emit = defineEmits(['seatsChanged']);
const tableSeatCount = ref(0);

watch(tableSeatCount, (newCount) => { emit('seatsChanged', newCount) });
</script>
<template>
    <div>
        <div class="rounded-xl m-4 p-4 border rounded-xl">
            <form>
                <SelectSeatCount :selectedCount="selectedSeatCount" @seats-changed="(n: number) => tableSeatCount = n" />
            </form>
        </div>
        <div class="flex flex-row gap-4 h-full mx-4">
            <div class="gap-4 basis-2/3">
                <PokerTable :seatOrder />
            </div>
            <div class="basis-1/3 p-4 border rounded-xl h-full">
                <GameSidePanel />
            </div>
        </div>
    </div>
</template>