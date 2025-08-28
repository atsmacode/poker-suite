<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
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
const seatCount = defineModel('seatCount', {type: Number});
const gameId = ref(null);
const tableSeats = ref([]);

const changeSeats = async () => {
    const res = await axios.post(
        route('scenarios.generate'),
        {
            table: {seats: seatCount.value},
            game: {id: gameId.value}
        },
        {
            headers: {'X-CSRF-TOKEN' : token}
        }
    );

    console.log(res);

    let scenario = res.data.data;

    gameId.value = scenario.game_id;
    tableSeats.value = scenario.seats;
}
</script>
<template>
    <Head title="Create Scenario" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-row gap-4 rounded-xl m-4 p-4 border rounded-xl">
            <div class="flex-1 rounded-xl">
                <form>
                    <label for="seats">Select seat count</label>
                    <select id="seats" name="seats" @change="changeSeats" v-model="seatCount">
                        <option disabled></option>
                        <option v-for="n in [2,3,4,5,6,7,8,9,10]" :value="n">{{ n }}</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="flex flex-row gap-4 h-full">
            <div class="gap-4 basis-1/2">
                <div class="grid grid-cols-3 gap-4 basis-full">
                    <div v-for="seat in tableSeats" class="rounded-xl m-4 p-4 border min-h-50">Seat #{{ seat.number }}</div>
                </div>
            </div>
            <div class="basis-1/2 rounded-xl m-4 p-4 border rounded-xl h-full">
                Data
            </div>
        </div>
    </AppLayout>
</template>