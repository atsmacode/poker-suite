<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import axios from 'axios';

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

const { token } = defineProps({'token': String});
const seatCount = defineModel('seatCount', {type: Number, default: 6});
const scenarioId = ref(null);
const gameId = ref(null);
const tableSeats = ref([]);

const changeSeats = async () => {
    const res = await axios.post(
        route('scenarios.run'),
        {
            id: gameId.value,
            table: {seats: seatCount.value},
            scenario: {id: scenarioId.value}
        },
        {
            headers: {'X-CSRF-TOKEN' : token}
        }
    );

    console.log(res);

    let gameResponse = res.data.data;

    scenarioId.value = gameResponse.scenario?.id;
    gameId.value = gameResponse.id;
    tableSeats.value = gameResponse.seats;
}

const seatOrder = computed(() => {
    const seats = tableSeats.value;
    const half = Math.ceil(tableSeats.value.length / 2);

    return [
        seats.slice(0, half), // Upper row
        seats.slice(half).reverse() // Lower row
    ];
});

changeSeats();
</script>
<template>
    <Head title="Create Scenario" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="rounded-xl m-4 p-4 border rounded-xl">
            <form>
                <label for="seats">Select seat count</label>
                <select id="seats" name="seats" @change="changeSeats" v-model="seatCount">
                    <option v-for="n in [6,7,8,9]" :value="n">{{ n }}</option>
                </select>
            </form>
        </div>

        <div class="flex flex-row gap-4 h-full mx-4">
            <div class="gap-4 basis-1/2">
                <div v-for="seats in seatOrder" class="flex justify-between gap-4 pb-4">
                    <div v-for="seat in seats" class="rounded-xl p-4 border min-h-50 w-48">Seat #{{ seat.number }}</div>
                </div>
            </div>
            <div class="basis-1/2 p-4 border rounded-xl h-full">
                Data
            </div>
        </div>
    </AppLayout>
</template>