<script setup>
import GameSidePanel from './GameSidePanel.vue';
import PokerTable from './PokerTable.vue';
import SelectSeatCount from './SelectSeatCount.vue';

const { seatOrder, players } = defineProps({seatOrder: Object, players: Object});
</script>
<template>
    <div class="poker-floor h-full">
        <div class="rounded-xl m-4 p-4 border rounded-xl bg-black">
            <form>
                <SelectSeatCount />
            </form>
        </div>
        <div class="flex flex-row gap-4 mx-4">
            <div class="gap-4 basis-2/3">
                <PokerTable :seatOrder :players />
            </div>
            <div class="basis-1/3 p-4 border rounded-xl bg-black">
                <GameSidePanel />
            </div>
        </div>
    </div>
</template>