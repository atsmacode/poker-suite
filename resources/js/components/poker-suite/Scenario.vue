<script setup>
import GameSidePanel from './GameSidePanel.vue';
import PokerTable from './PokerTable.vue';
import SelectSeatCount from './SelectSeatCount.vue';
import { watch, ref } from 'vue';

const { seatOrder, selectedSeatCount } = defineProps({seatOrder: Object, selectedSeatCount: {type: Number, default: 6}});
const emit = defineEmits(['seatsChanged']);
const tableSeatCount = ref(0);

watch(tableSeatCount, (newCount) => { emit('seatsChanged', newCount) });
</script>
<template>
    <div class="poker-floor h-full">
        <div class="rounded-xl m-4 p-4 border rounded-xl bg-black">
            <form>
                <SelectSeatCount :selectedCount="selectedSeatCount" @seats-changed="(n: number) => tableSeatCount = n" />
            </form>
        </div>
        <div class="flex flex-row gap-4 mx-4">
            <div class="gap-4 basis-2/3">
                <PokerTable :seatOrder />
            </div>
            <div class="basis-1/3 p-4 border rounded-xl bg-black">
                <GameSidePanel />
            </div>
        </div>
    </div>
</template>