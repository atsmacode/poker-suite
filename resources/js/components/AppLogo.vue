<script setup lang="ts">
import { Spade } from 'lucide-vue-next';
</script>

<template>
    <div class="flex aspect-square size-8 items-center justify-center rounded-md text-sidebar-primary-foreground">
        <Spade />
        <!-- <AppLogoIcon class="size-5 fill-current text-white dark:text-black" /> -->
    </div>
    <div class="ml-1 grid flex-1 text-left">
        <span class="mb-0.5 truncate leading-tight font-semibold"><span class="text-green-600">Poker</span>Suite</span>
    </div>
</template>
