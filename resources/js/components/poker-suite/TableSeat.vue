<script setup>
import WholeCards from './WholeCards.vue';

const { seat, player } = defineProps({seat: Object}, {player: Object});
</script>
<template>
    <div class="rounded-xl p-2 border h-30 w-30 bg-black shadow-xl">
        <WholeCards />
        <div class="p-2">
            #{{ seat.number }} {{ seat.player_id ? seat.player_id : 'Empty' }}
        </div>
    </div>
</template>