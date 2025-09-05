<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';

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
                <Button :variant="'green'"><Link :href="route('scenarios.create')">Create Scenario</Link></Button>
            </div>
        </div>

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="relative min-h-[100vh] flex-1 border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-left">
                            <th>Name</th>
                            <th>Status</th>
                            <th>Scenario ID</th>
                            <th>Game ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-y bg-[#111111]" v-for="(scenario, n) in scenarios.data" :class="{'bg-[#202020]': n % 2}">
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
                                <Button><Link :href="route('scenarios.edit', scenario.id)">Open</Link></Button>
                            </td>
                            <td>
                                <Button :variant="'green'" v-if="scenario.draft" @click="changeDraftStatus(scenario.id, false)">Save Draft</Button>
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