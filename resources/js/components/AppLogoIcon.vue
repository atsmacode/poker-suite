<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { Spade } from 'lucide-vue-next';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <Spade />
</template>
