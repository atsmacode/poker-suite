<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import TextLink from '@/components/TextLink.vue';
import axios from 'axios';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Scenarios',
        href: '/scenarios',
    },
];

const { scenarios } = defineProps({scenarios: Object});

const changeDraftStatus = async (scenarioId: number, draft: boolean) => {
    try {
        let res = await axios.patch(route('scenarios.draft', scenarioId), {draft: draft});

        console.log(res.data);

        scenarios.data[scenarioId].draft = 0;
    } catch (err: any) {
        console.log(err);
    }
};
</script>
<template>
    <Head title="Scenarios" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-row p-4">
            <div class="basis-64">
                <TextLink :href="route('scenarios.create')">Create Scenario</TextLink>
            </div>
        </div>

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <table class="table-auto w-full">
                    <thead>
                        <tr >
                            <th>Name</th>
                            <th>Status</th>
                            <th>Scenario ID</th>
                            <th>Game ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border" v-for="scenario in scenarios.data">
                            <td>
                                {{ scenario.name }}
                            </td>
                            <td>
                                {{ scenario.draft ? 'Draft' : 'Saved' }}
                            </td>
                            <td>
                                {{ scenario.id }}
                            </td>
                            <td>
                                {{ scenario.game_id }}
                            </td>
                            <td>
                                <TextLink :href="route('scenarios.edit', scenario.id)">Open</TextLink>
                            </td>
                            <td>
                                <button v-if="scenario.draft" @click="changeDraftStatus(scenario.id, false)">Save Draft</button>
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