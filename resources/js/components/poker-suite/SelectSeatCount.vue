<script setup>
import { inject } from 'vue';

const seatCount = defineModel({seatCount: Number});
const selectedCount = inject('selectedSeatCount');

seatCount.value = selectedCount;

const seatsChangedHandler = inject('seatsChangedHandler');
</script>
<template>
    <div>
        <label for="seats">Select seat count</label>
        <select id="seats" name="seats" @change="seatsChangedHandler" v-model="seatCount">
            <option v-for="n in [6,7,8,9]" :value="n">{{ n }}</option>
        </select>
    </div>
</template>