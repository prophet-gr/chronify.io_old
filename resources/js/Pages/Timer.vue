<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref, computed, onMounted, onUnmounted } from 'vue';
import AppLayout from '../Layouts/AppLayout.vue';

const props = defineProps({
    activeEntry: { type: Object, default: null },
    projects: { type: Array, default: () => [] },
    tasks: { type: Array, default: () => [] },
    todayEntries: { type: Array, default: () => [] },
});

const selectedProjectId = ref(null);
const selectedTaskId = ref(null);
const notes = ref('');
const elapsed = ref(0);
let interval = null;

const isRunning = computed(() => !!props.activeEntry && !props.activeEntry.ended_at);

const availableTasks = computed(() => {
    if (!selectedProjectId.value) return [];
    return props.tasks.filter(t => t.project_id === selectedProjectId.value);
});

const formatDuration = (seconds) => {
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    const s = seconds % 60;
    return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
};

const formatHours = (seconds) => {
    if (!seconds) return '0m';
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return h > 0 ? `${h}h ${m}m` : `${m}m`;
};

const formatTime = (dateStr) => {
    if (!dateStr) return '—';
    return new Date(dateStr).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
};

const startTimer = () => {
    if (!selectedProjectId.value) return;
    router.post('/timer/start', {
        project_id: selectedProjectId.value,
        task_id: selectedTaskId.value,
        notes: notes.value || undefined,
    }, { preserveState: false });
};

const stopTimer = () => {
    router.post(`/timer/stop`, {}, { preserveState: false });
};

const tickTimer = () => {
    if (!props.activeEntry?.started_at) return;
    const startedAt = new Date(props.activeEntry.started_at).getTime();
    const tick = () => {
        elapsed.value = Math.floor((Date.now() - startedAt) / 1000);
    };
    tick();
    interval = setInterval(tick, 1000);
};

onMounted(() => {
    if (isRunning.value) {
        selectedProjectId.value = props.activeEntry.project_id;
        selectedTaskId.value = props.activeEntry.task_id;
        tickTimer();
    }
});

onUnmounted(() => {
    if (interval) clearInterval(interval);
});
</script>

<template>
    <Head title="Timer" />
    <AppLayout>
        <template #header>Timer</template>

        <div class="max-w-2xl mx-auto">
            <!-- Timer display -->
            <div class="bg-white rounded-xl shadow-card border border-surface-200 p-8 text-center">
                <p
                    class="text-6xl font-mono font-bold timer-display"
                    :class="isRunning ? 'text-surface-900' : 'text-surface-300'"
                >
                    {{ formatDuration(elapsed) }}
                </p>

                <p v-if="isRunning && activeEntry?.project" class="mt-3 text-surface-500">
                    <span class="inline-block w-2.5 h-2.5 rounded-full mr-1.5" :style="{ backgroundColor: activeEntry.project.color || '#6366f1' }" />
                    {{ activeEntry.project.name }}
                    <template v-if="activeEntry.task"> &middot; {{ activeEntry.task.name }}</template>
                </p>

                <!-- Controls -->
                <div class="mt-6 space-y-4">
                    <div v-if="!isRunning" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <select
                            v-model="selectedProjectId"
                            class="w-full px-3 py-2.5 border border-surface-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500"
                        >
                            <option :value="null" disabled>Select project...</option>
                            <option v-for="project in projects" :key="project.id" :value="project.id">
                                {{ project.name }}
                            </option>
                        </select>

                        <select
                            v-model="selectedTaskId"
                            :disabled="!selectedProjectId || availableTasks.length === 0"
                            class="w-full px-3 py-2.5 border border-surface-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 disabled:opacity-50"
                        >
                            <option :value="null">No task (optional)</option>
                            <option v-for="task in availableTasks" :key="task.id" :value="task.id">
                                {{ task.name }}
                            </option>
                        </select>
                    </div>

                    <input
                        v-if="!isRunning"
                        v-model="notes"
                        type="text"
                        placeholder="What are you working on? (optional)"
                        class="w-full px-3 py-2.5 border border-surface-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500"
                    />

                    <div class="flex justify-center gap-3">
                        <button
                            v-if="!isRunning"
                            @click="startTimer"
                            :disabled="!selectedProjectId"
                            class="inline-flex items-center gap-2 px-8 py-3 bg-brand-500 hover:bg-brand-600 disabled:opacity-50 disabled:cursor-not-allowed text-white rounded-lg font-medium shadow-sm"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                            Start
                        </button>
                        <button
                            v-else
                            @click="stopTimer"
                            class="inline-flex items-center gap-2 px-8 py-3 bg-danger-500 hover:bg-danger-600 text-white rounded-lg font-medium shadow-sm"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <rect x="6" y="6" width="12" height="12" rx="1" />
                            </svg>
                            Stop
                        </button>
                    </div>
                </div>
            </div>

            <!-- Today's entries -->
            <div class="mt-6 bg-white rounded-xl shadow-card border border-surface-200">
                <div class="px-6 py-4 border-b border-surface-200">
                    <h3 class="text-sm font-medium text-surface-500 uppercase tracking-wide">Today's Entries</h3>
                </div>
                <div v-if="todayEntries.length === 0" class="px-6 py-8 text-center text-surface-400 text-sm">
                    No entries today yet.
                </div>
                <div v-else class="divide-y divide-surface-100">
                    <div v-for="entry in todayEntries" :key="entry.id" class="px-6 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="w-2 h-2 rounded-full flex-shrink-0" :style="{ backgroundColor: entry.project?.color || '#6366f1' }" />
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-surface-900 truncate">{{ entry.project?.name || '—' }}</p>
                                <p v-if="entry.notes" class="text-xs text-surface-400 truncate">{{ entry.notes }}</p>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0 ml-4">
                            <p class="text-sm font-mono text-surface-900">
                                {{ entry.ended_at ? formatHours(entry.duration) : 'Running...' }}
                            </p>
                            <p class="text-xs text-surface-400">
                                {{ formatTime(entry.started_at) }} — {{ entry.ended_at ? formatTime(entry.ended_at) : 'now' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
