<script setup>
const { seat, player } = defineProps(['seat', 'player']);
</script>
<template>
    <div class="rounded-xl p-2 border h-30 w-30 bg-black shadow-xl">
        <div class="grid grid-cols-2">
            <div class="border rounded w10 h-15 m-1">
            </div>
            <div class="border rounded w10 h-15 m-1">
            </div>
        </div>
        <div class="p-2">
            #{{ seat.number }} {{ seat.player_id ? seat.player_id : 'Empty' }}
        </div>
    </div>
</template>