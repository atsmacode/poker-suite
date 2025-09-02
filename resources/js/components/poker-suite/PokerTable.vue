<script setup>
const { seatOrder } = defineProps(['seatOrder']);
</script>
<template>
    <div>
        <div class="border rounded-full m-10">
            <div v-for="(seats, index) in seatOrder" :class="{'mb-60': index == 0}" class="flex justify-between gap-4 m-10">
                <div v-for="seat in seats" class="rounded-xl p-4 border h-20 w-30">Seat #{{ seat.number }}</div>
            </div>
        </div>
    </div>
</template>