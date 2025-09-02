<script setup>
import { watch } from 'vue';

const { selectedCount } = defineProps({selectedCount: Number, default: 6})
const seatCount = defineModel({seatCount: Number, default: 6});
const emit = defineEmits(['seatsChanged']);

seatCount.value = selectedCount;

watch(seatCount, (newCount) => {
    emit('seatsChanged', newCount);
});
</script>
<template>
    <div>
        <label for="seats">Select seat count</label>
        <select id="seats" name="seats" v-model="seatCount">
            <option v-for="n in [6,7,8,9]" :value="n">{{ n }}</option>
        </select>
    </div>
</template>