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
const seats = defineModel('seats', {type: Number});
const gameId = ref(null);

const changeSeats = async () => {
    const res = await axios.post(route('scenarios.generate'), {
        '_token': token,
        table: {
            name: "Test Table",
            seats: seats.value
        },
        game: {
            id: gameId.value,
            style: 'plhe'
        }
    });

    console.log(res);

    gameId.value = res.data.id;
}


</script>
<template>
    <Head title="Create Scenario" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-row gap-4 rounded-xl m-4 p-4 border rounded-xl">
            <div class="flex-1 rounded-xl">
                <form>
                    <label for="seats">Select seat count</label>
                    <select id="seats" name="seats" @change="changeSeats" v-model="seats">
                        <option disabled></option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="flex flex-row gap-4 h-full">
            <div class="gap-4 basis-1/2">
                <div class="flex flex-row gap-4 basis-full">
                    <div class="basis-1/3 rounded-xl m-4 p-4 border rounded-xl min-h-50">Seat 1</div>
                    <div class="basis-1/3 rounded-xl m-4 p-4 border rounded-xl min-h-50">Seat 2</div>
                    <div class="basis-1/3 rounded-xl m-4 p-4 border rounded-xl min-h-50">Seat 3</div>
                </div>
                <div class="flex flex-row gap-4 basis-full">
                    <div class="basis-1/3 rounded-xl m-4 p-4 border rounded-xl min-h-50">Seat 4</div>
                    <div class="basis-1/3 rounded-xl m-4 p-4 border rounded-xl min-h-50">Seat 5</div>
                    <div class="basis-1/3 rounded-xl m-4 p-4 border rounded-xl min-h-50">Seat 6</div>
                </div>
            </div>
            <div class="basis-1/2 rounded-xl m-4 p-4 border rounded-xl h-full">
                Data
            </div>
        </div>
    </AppLayout>
</template>