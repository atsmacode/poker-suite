<script setup>
const { seatOrder } = defineProps(['seatOrder']);
</script>
<template>
    <div>
        <div v-for="seats in seatOrder" class="flex justify-between gap-4 pb-4">
            <div v-for="seat in seats" class="rounded-xl p-4 border min-h-50 w-48">Seat #{{ seat.number }}</div>
        </div>
    </div>
</template>