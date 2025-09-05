<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';

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
                <Button :variant="'green'"><Link :href="route('games.create')">Create Game</Link></Button>
            </div>
        </div>

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="relative min-h-[100vh] flex-1 border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-left">
                            <th>ID</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="games.length > 0" class="border-y bg-[#111111]" v-for="(game, n) in games" :class="{'bg-[#202020]': n % 2}">
                            <td>
                                {{ game.id }}
                            </td>
                            <td>
                                Created
                            </td>
                            <td>
                                <Button><Link :href="route('games.show', game.id )">Open</Link></Button>
                            </td>
                        </tr>
                        <tr v-else>
                            <td>No Games to display...</td>
                            <td></td>
                            <td></td>
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