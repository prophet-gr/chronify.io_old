<script setup>
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import UiBadge from '../../Components/UiBadge.vue';
import UiEmptyState from '../../Components/UiEmptyState.vue';

const props = defineProps({
    entries: { type: Array, default: () => [] },
    totalDuration: { type: Number, default: 0 },
});

const formatDuration = (seconds) => {
    if (!seconds) return '—';
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    const s = seconds % 60;
    if (h > 0) return `${h}h ${m}m`;
    if (m > 0) return `${m}m ${s}s`;
    return `${s}s`;
};

const formatTime = (dateStr) => {
    if (!dateStr) return '—';
    return new Date(dateStr).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
};

const formatDate = (dateStr) => {
    if (!dateStr) return '—';
    return new Date(dateStr).toLocaleDateString([], { weekday: 'short', month: 'short', day: 'numeric' });
};

// Group entries by date
const groupedEntries = computed(() => {
    const groups = {};
    for (const entry of props.entries) {
        const date = entry.started_at ? new Date(entry.started_at).toLocaleDateString() : 'Unknown';
        if (!groups[date]) {
            groups[date] = { label: formatDate(entry.started_at), entries: [], totalDuration: 0 };
        }
        groups[date].entries.push(entry);
        groups[date].totalDuration += entry.duration || 0;
    }
    return Object.values(groups);
});
</script>

<template>
    <Head title="Time Entries" />
    <AppLayout>
        <template #header>Time Entries</template>

        <!-- Summary bar -->
        <div v-if="entries.length > 0" class="flex items-center gap-6 mb-4 px-1">
            <p class="text-sm text-surface-500">
                <span class="font-medium text-surface-900">{{ entries.length }}</span> entries
            </p>
            <p class="text-sm text-surface-500">
                Total: <span class="font-medium text-surface-900 font-mono">{{ formatDuration(totalDuration) }}</span>
            </p>
        </div>

        <!-- Grouped entries -->
        <div v-if="groupedEntries.length > 0" class="space-y-4">
            <div
                v-for="(group, index) in groupedEntries"
                :key="index"
                class="bg-white rounded-xl border border-surface-200 shadow-card overflow-hidden"
            >
                <!-- Date header -->
                <div class="flex items-center justify-between px-5 py-3 bg-surface-50 border-b border-surface-100">
                    <h3 class="text-sm font-semibold text-surface-700">{{ group.label }}</h3>
                    <span class="text-sm font-mono text-surface-500">{{ formatDuration(group.totalDuration) }}</span>
                </div>

                <!-- Entries -->
                <div class="divide-y divide-surface-100">
                    <div
                        v-for="entry in group.entries"
                        :key="entry.id"
                        class="flex items-center gap-4 px-5 py-3 hover:bg-surface-50 transition-colors"
                    >
                        <!-- Project color dot -->
                        <span
                            class="w-2.5 h-2.5 rounded-full shrink-0"
                            :style="{ backgroundColor: entry.project?.color || '#6366f1' }"
                        />

                        <!-- Entry details -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <p class="text-sm font-medium text-surface-900 truncate">
                                    {{ entry.project?.name || 'No project' }}
                                </p>
                                <span v-if="entry.task" class="text-sm text-surface-400 truncate">
                                    / {{ entry.task.name }}
                                </span>
                            </div>
                            <p v-if="entry.notes" class="text-xs text-surface-400 truncate mt-0.5">
                                {{ entry.notes }}
                            </p>
                        </div>

                        <!-- Billable badge -->
                        <UiBadge v-if="entry.is_billable" variant="success" size="sm">$</UiBadge>

                        <!-- Time range -->
                        <div class="text-right shrink-0">
                            <p class="text-sm text-surface-600">
                                {{ formatTime(entry.started_at) }}
                                <span class="text-surface-300 mx-0.5">-</span>
                                <template v-if="entry.ended_at">{{ formatTime(entry.ended_at) }}</template>
                                <span v-else class="text-timer-active font-medium">now</span>
                            </p>
                        </div>

                        <!-- Duration -->
                        <div class="w-20 text-right shrink-0">
                            <span
                                :class="[
                                    'text-sm font-mono font-medium',
                                    entry.ended_at ? 'text-surface-900' : 'text-timer-active',
                                ]"
                            >
                                {{ entry.ended_at ? formatDuration(entry.duration) : 'Running' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty state -->
        <div v-else class="bg-white rounded-xl border border-surface-200 shadow-card">
            <UiEmptyState
                title="No time entries"
                description="Start a timer from the Dashboard or Timer page to begin tracking your time."
            >
                <template #icon>
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </template>
            </UiEmptyState>
        </div>
    </AppLayout>
</template>
