<script setup>
import Button from '@/components/ui/button/Button.vue';
import Card from './Card.vue';
import axios from 'axios';
import { inject } from 'vue';

const { seat, player } = defineProps({seat: Object, player: {type: Object, default: null}});
const { scenarioId, forScenario } = inject('scenario');
const refreshGameState = inject('refreshGameState');

const addPlayer = async () => {
    try {
        let res = await axios.post(route('scenarios.players.store', {id: scenarioId.value}), {table_seat_id: seat.id});

        console.log(res.data);

        let gameState = res.data.data;

        refreshGameState(gameState);
    } catch (err) {
        console.log(err);
    }
};
</script>
<template>
    <div class="rounded-xl p-2 border w-30 bg-black shadow-xl">
        <div class="grid grid-cols-2">
            <Card />
            <Card />
        </div>
        <div class="p-2 text-xs">
            {{ seat.player_id ? player?.name : 'Empty Seat' }}

            <Button v-if="! seat.player_id && forScenario" :variant="'green'" :size="'xs'" @click="addPlayer">Add Player</Button>
        </div>
    </div>
</template>