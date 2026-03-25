<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import AppLayout from '../Layouts/AppLayout.vue';

const props = defineProps({
    entries: { type: Array, default: () => [] },
    projects: { type: Array, default: () => [] },
    filters: { type: Object, default: () => ({}) },
    summary: { type: Object, default: () => ({}) },
});

const dateFrom = ref(props.filters.from || '');
const dateTo = ref(props.filters.to || '');
const projectFilter = ref(props.filters.project_id || '');

const applyFilters = () => {
    router.get('/reports', {
        from: dateFrom.value || undefined,
        to: dateTo.value || undefined,
        project_id: projectFilter.value || undefined,
    }, { preserveState: true, replace: true });
};

const formatHours = (seconds) => {
    if (!seconds) return '0h 0m';
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return h > 0 ? `${h}h ${m}m` : `${m}m`;
};

const formatDate = (dateStr) => {
    if (!dateStr) return '—';
    return new Date(dateStr).toLocaleDateString([], { month: 'short', day: 'numeric', year: 'numeric' });
};

const formatTime = (dateStr) => {
    if (!dateStr) return '—';
    return new Date(dateStr).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
};
</script>

<template>
    <Head title="Reports" />
    <AppLayout>
        <template #header>Reports</template>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-card border border-surface-200 p-4 mb-6">
            <div class="flex flex-wrap items-end gap-4">
                <div>
                    <label class="block text-xs font-medium text-surface-500 mb-1">From</label>
                    <input
                        v-model="dateFrom"
                        type="date"
                        class="px-3 py-2 border border-surface-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500"
                    />
                </div>
                <div>
                    <label class="block text-xs font-medium text-surface-500 mb-1">To</label>
                    <input
                        v-model="dateTo"
                        type="date"
                        class="px-3 py-2 border border-surface-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500"
                    />
                </div>
                <div>
                    <label class="block text-xs font-medium text-surface-500 mb-1">Project</label>
                    <select
                        v-model="projectFilter"
                        class="px-3 py-2 border border-surface-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500"
                    >
                        <option value="">All projects</option>
                        <option v-for="project in projects" :key="project.id" :value="project.id">
                            {{ project.name }}
                        </option>
                    </select>
                </div>
                <button
                    @click="applyFilters"
                    class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white rounded-lg text-sm font-medium shadow-sm"
                >
                    Apply
                </button>
            </div>
        </div>

        <!-- Summary cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-card border border-surface-200 p-5">
                <p class="text-xs font-medium text-surface-500 uppercase">Total Hours</p>
                <p class="mt-2 text-2xl font-semibold text-surface-900 font-mono">{{ formatHours(summary.total_duration || 0) }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-card border border-surface-200 p-5">
                <p class="text-xs font-medium text-surface-500 uppercase">Total Entries</p>
                <p class="mt-2 text-2xl font-semibold text-surface-900">{{ summary.total_entries || 0 }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-card border border-surface-200 p-5">
                <p class="text-xs font-medium text-surface-500 uppercase">Projects Tracked</p>
                <p class="mt-2 text-2xl font-semibold text-surface-900">{{ summary.projects_count || 0 }}</p>
            </div>
        </div>

        <!-- Hours by project -->
        <div v-if="summary.by_project && summary.by_project.length > 0" class="bg-white rounded-xl shadow-card border border-surface-200 mb-6">
            <div class="px-6 py-4 border-b border-surface-200">
                <h3 class="text-sm font-medium text-surface-500 uppercase tracking-wide">Hours by Project</h3>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="border-b border-surface-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Project</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-surface-500 uppercase">Entries</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-surface-500 uppercase">Duration</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-surface-500 uppercase">%</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-100">
                    <tr v-for="row in summary.by_project" :key="row.project_id" class="hover:bg-surface-50">
                        <td class="px-6 py-3 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full" :style="{ backgroundColor: row.color || '#6366f1' }" />
                                {{ row.project_name }}
                            </div>
                        </td>
                        <td class="px-6 py-3 text-sm text-right text-surface-500">{{ row.entries_count }}</td>
                        <td class="px-6 py-3 text-sm text-right font-mono font-medium">{{ formatHours(row.total_duration) }}</td>
                        <td class="px-6 py-3 text-sm text-right text-surface-500">
                            {{ summary.total_duration > 0 ? Math.round((row.total_duration / summary.total_duration) * 100) : 0 }}%
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Entries table -->
        <div class="bg-white rounded-xl shadow-card border border-surface-200">
            <div class="px-6 py-4 border-b border-surface-200">
                <h3 class="text-sm font-medium text-surface-500 uppercase tracking-wide">Time Entries</h3>
            </div>
            <div v-if="entries.length === 0" class="px-6 py-8 text-center text-surface-400 text-sm">
                No entries found for the selected date range.
            </div>
            <div v-else class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-surface-100">
                            <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Project</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Task</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Notes</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Start</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">End</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-surface-500 uppercase">Duration</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-100">
                        <tr v-for="entry in entries" :key="entry.id" class="hover:bg-surface-50">
                            <td class="px-6 py-3 text-sm text-surface-500">{{ formatDate(entry.started_at) }}</td>
                            <td class="px-6 py-3 text-sm">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full" :style="{ backgroundColor: entry.project?.color || '#6366f1' }" />
                                    {{ entry.project?.name || '—' }}
                                </div>
                            </td>
                            <td class="px-6 py-3 text-sm text-surface-500">{{ entry.task?.name || '—' }}</td>
                            <td class="px-6 py-3 text-sm text-surface-500 max-w-[200px] truncate">{{ entry.notes || '—' }}</td>
                            <td class="px-6 py-3 text-sm text-surface-500">{{ formatTime(entry.started_at) }}</td>
                            <td class="px-6 py-3 text-sm text-surface-500">{{ entry.ended_at ? formatTime(entry.ended_at) : '—' }}</td>
                            <td class="px-6 py-3 text-sm text-right font-mono font-medium">{{ formatHours(entry.duration || 0) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
