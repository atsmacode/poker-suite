<script setup>
import { inject } from 'vue';

const seatCount = defineModel({seatCount: Number});
const { setSeatCount, tableSeatCount } = inject('seatSelection');

seatCount.value = tableSeatCount.value;

</script>
<template>
    <div>
        <label for="seats">Select seat count</label>
        <select id="seats" name="seats" @change="setSeatCount" v-model="seatCount">
            <option v-for="n in [6,7,8,9]" :value="n">{{ n }}</option>
        </select>
    </div>
</template>