<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import TimerWidget from '../Components/TimerWidget.vue';
import StatCard from '../Components/StatCard.vue';

const props = defineProps({
    activeEntry: { type: Object, default: null },
    projects: { type: Array, default: () => [] },
    todayHours: { type: Number, default: 0 },
    weekHours: { type: Number, default: 0 },
    todayEntries: { type: Number, default: 0 },
    recentEntries: { type: Array, default: () => [] },
});

const formatHours = (seconds) => {
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return h > 0 ? `${h}h ${m}m` : `${m}m`;
};

const formatTime = (dateStr) => {
    if (!dateStr) return '—';
    const d = new Date(dateStr);
    return d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
};

const entryDuration = (entry) => {
    if (entry.duration) return formatHours(entry.duration);
    if (entry.started_at && !entry.ended_at) return 'Running...';
    return '—';
};
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <template #header>Dashboard</template>

        <!-- Timer widget -->
        <TimerWidget :active-entry="activeEntry" :projects="projects" />

        <!-- Stats row -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
            <StatCard title="Today" :value="formatHours(todayHours)" :subtitle="`${todayEntries} entries`" icon="clock" />
            <StatCard title="This Week" :value="formatHours(weekHours)" icon="calendar" />
            <StatCard title="Projects" :value="String(projects.length)" icon="folder" />
        </div>

        <!-- Recent entries -->
        <div class="mt-6 bg-white rounded-xl shadow-card border border-surface-200">
            <div class="px-6 py-4 border-b border-surface-200">
                <h3 class="text-sm font-medium text-surface-500 uppercase tracking-wide">Recent Time Entries</h3>
            </div>
            <div v-if="recentEntries.length === 0" class="px-6 py-8 text-center text-surface-400 text-sm">
                No time entries yet. Start a timer to begin tracking.
            </div>
            <table v-else class="w-full">
                <thead>
                    <tr class="border-b border-surface-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Project</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Task</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Started</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-surface-500 uppercase">Duration</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-100">
                    <tr v-for="entry in recentEntries" :key="entry.id" class="hover:bg-surface-50">
                        <td class="px-6 py-3 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full" :style="{ backgroundColor: entry.project?.color || '#6366f1' }" />
                                {{ entry.project?.name || '—' }}
                            </div>
                        </td>
                        <td class="px-6 py-3 text-sm text-surface-500">{{ entry.task?.name || '—' }}</td>
                        <td class="px-6 py-3 text-sm text-surface-500">{{ formatTime(entry.started_at) }}</td>
                        <td class="px-6 py-3 text-sm font-mono">
                            <span :class="entry.ended_at ? 'text-surface-900' : 'text-timer-active font-medium'">
                                {{ entryDuration(entry) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
