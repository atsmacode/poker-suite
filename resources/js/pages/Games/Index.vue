<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import TextLink from '@/components/TextLink.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Games',
        href: '/games',
    },
];

defineProps({games: Object});
</script>
<template>
    <Head title="Games" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-row p-4">
            <div class="basis-64">
                <TextLink :href="route('games.create')">Create Game</TextLink>
            </div>
        </div>

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <table class="table-auto w-full">
                <thead>
                    <tr >
                        <th>ID</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border" v-for="game in games">
                        <td>
                            {{ game.id }}
                        </td>
                        <td>
                            <TextLink :href="route('games.show', game.id )">Open</TextLink>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<style>
table td, table th {
    padding: 1rem;
}
</style>