<script setup>
import Card from './Card.vue';

const { seat, player } = defineProps({seat: Object, player: {type: Object, default: null}});
</script>
<template>
    <div class="rounded-xl p-2 border h-30 w-30 bg-black shadow-xl">
        <div class="grid grid-cols-2">
            <Card />
            <Card />
        </div>
        <div class="p-2 text-xs">
            {{ seat.player_id ? player?.name : 'Empty Seat' }}
        </div>
    </div>
</template>