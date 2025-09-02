<script setup>
const { seatOrder } = defineProps(['seatOrder']);
</script>
<template>
    <div>
        <div class="relative border-30 border-emerald-900 rounded-full m-10 bg-emerald-950 text-center">
            <div class="flex justify-between gap-4 m-5">
                <div v-for="seat in seatOrder[0]" class="rounded-xl p-2 border h-30 w-30 bg-black shadow-xl">Seat #{{ seat.number }}</div>
            </div>
            <div class="grid grid-cols-12 m-2 text-left">
                <span class="font-extrabold text-xl col-start-4 col-end-6">Pot: #</span>
                <span class="font-extrabold text-xl col-start-8 col-end-10">Other info: ...</span>
            </div>
            <div class="grid grid-cols-12">
                <span class="border border-emerald-900 rounded h-30 col-start-3 col-end-11 p-2">Community cards</span>
            </div>
            <div class="flex justify-between gap-4 m-5">
                <div v-for="seat in seatOrder[1]" class="rounded-xl p-2 border h-30 w-30 bg-black shadow-xl">Seat #{{ seat.number }}</div>
            </div>
        </div>
    </div>
</template>