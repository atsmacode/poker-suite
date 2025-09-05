<script setup lang="ts">
import TableSeat from './TableSeat.vue';

const { seatOrder, players } = defineProps({seatOrder: Object, players: {type: Object, default: null} });

const getPlayer = (playerId: number|null) => {
    if (! players) {
        return null;
    }

    return players[playerId];
}
</script>
<template>
    <div>
        <div id="poker-table" class="poker-table-logo relative border-30 border-green-900 rounded-full m-10 bg-emerald-950 text-center">
            <div class="flex justify-between gap-4 m-5">
                <TableSeat v-for="seat in seatOrder[0]" :seat :player="getPlayer(seat.player_id)" />
            </div>
            <div class="grid grid-cols-12 m-2 text-left">
                <span class="font-extrabold text-xl col-start-4 col-end-6">Pot: #</span>
                <span class="font-extrabold text-xl col-start-8 col-end-10">Other info:</span>
            </div>
            <div class="grid grid-cols-12">
                <span class="rounded h-30 col-start-3 col-end-11 p-2"></span>
            </div>
            <div class="flex justify-between gap-4 m-5">
                <TableSeat v-for="seat in seatOrder[1]" :seat :player="getPlayer(seat.player_id)"  />
            </div>
        </div>
    </div>
</template>
