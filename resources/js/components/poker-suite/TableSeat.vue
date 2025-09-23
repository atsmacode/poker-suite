<script setup>
import Button from '@/components/ui/button/Button.vue';
import Card from './Card.vue';
import axios from 'axios';
import { computed, inject } from 'vue';

const { seat, player } = defineProps({seat: Object, player: {type: Object, default: null}});
const { scenarioId, forScenario } = inject('scenarioSetup', {scenarioId: null, forScenario: false});
const refreshGameSetup = inject('refreshGameSetup', null);

const empty = computed(() => ! seat.player_id);
const emptyScenarioSeat = computed(() => empty.value && forScenario.value);

const addPlayer = async () => {
    try {
        let res = await axios.post(route('scenarios.players.store', {id: scenarioId.value}), {table_seat_id: seat.id});

        console.log(res.data);

        let gameState = res.data.data;

        refreshGameSetup(gameState);
    } catch (err) {
        console.log(err);
    }
};
</script>
<template>
    <div class="relative">
        <div class="rounded-xl p-2 border w-30 bg-black shadow-xl" :class="{'opacity-50 rounded-b-none': emptyScenarioSeat}">
            <div class="grid grid-cols-2">
                <Card />
                <Card />
            </div>
            <div class="p-2 text-xs">
                {{ ! empty ? player?.name : 'Empty Seat' }}
            </div>
        </div>
        <Button class="w-full" v-if="emptyScenarioSeat" :variant="'default_append'" :size="'xs_append'" @click="addPlayer">Add Player</Button>
    </div>
</template>