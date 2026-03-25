<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    activeEntry: { type: Object, default: null },
    projects: { type: Array, default: () => [] },
});

const elapsed = ref(0);
let interval = null;

const formatDuration = (seconds) => {
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    const s = seconds % 60;
    return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
};

const isRunning = computed(() => !!props.activeEntry && !props.activeEntry.ended_at);

const timerState = computed(() => {
    if (!props.activeEntry) return 'stopped';
    if (props.activeEntry.ended_at) return 'stopped';
    return 'running';
});

const stateConfig = computed(() => ({
    running: {
        ringColor: 'ring-timer-active/20',
        textColor: 'text-surface-900',
        badgeBg: 'bg-success-50',
        badgeText: 'text-success-700',
        dotColor: 'bg-timer-active',
        label: 'Running',
    },
    stopped: {
        ringColor: 'ring-surface-200',
        textColor: 'text-surface-300',
        badgeBg: 'bg-surface-100',
        badgeText: 'text-surface-500',
        dotColor: 'bg-surface-400',
        label: 'Stopped',
    },
}[timerState.value]));

const startTimer = () => {
    if (interval) clearInterval(interval);
    if (!props.activeEntry?.started_at) return;

    const startedAt = new Date(props.activeEntry.started_at).getTime();
    const tick = () => {
        elapsed.value = Math.floor((Date.now() - startedAt) / 1000);
    };
    tick();
    interval = setInterval(tick, 1000);
};

const stopTimer = () => {
    router.post(`/api/time-entries/${props.activeEntry.id}/stop`, {}, {
        preserveState: false,
        onSuccess: () => {
            if (interval) clearInterval(interval);
            elapsed.value = 0;
        },
    });
};

const startNewEntry = (projectId) => {
    router.post('/timer/start', { project_id: projectId }, {
        preserveState: false,
    });
};

onMounted(() => {
    if (isRunning.value) startTimer();
});

onUnmounted(() => {
    if (interval) clearInterval(interval);
});
</script>

<template>
    <div class="bg-white rounded-xl shadow-card border border-surface-200 overflow-hidden">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-surface-100">
            <h3 class="text-sm font-medium text-surface-500 uppercase tracking-wide">Active Timer</h3>
            <span
                :class="[
                    'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium',
                    stateConfig.badgeBg,
                    stateConfig.badgeText,
                ]"
            >
                <span
                    :class="['w-1.5 h-1.5 rounded-full', stateConfig.dotColor]"
                    :style="isRunning ? { animation: 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite' } : {}"
                />
                {{ stateConfig.label }}
            </span>
        </div>

        <!-- Timer display -->
        <div class="px-6 py-8 text-center">
            <div
                :class="[
                    'inline-flex items-center justify-center w-48 h-48 rounded-full ring-4 transition-all duration-500',
                    stateConfig.ringColor,
                    isRunning ? 'bg-surface-50' : 'bg-white',
                ]"
            >
                <p
                    :class="[
                        'text-4xl sm:text-5xl font-mono font-semibold timer-display transition-colors',
                        stateConfig.textColor,
                    ]"
                >
                    {{ formatDuration(elapsed) }}
                </p>
            </div>

            <!-- Active project indicator -->
            <p v-if="isRunning && activeEntry?.project" class="mt-4 text-sm text-surface-500">
                <span
                    class="inline-block w-2.5 h-2.5 rounded-full mr-1.5 align-middle"
                    :style="{ backgroundColor: activeEntry.project.color || '#6366f1' }"
                />
                <span class="font-medium text-surface-700">{{ activeEntry.project.name }}</span>
                <template v-if="activeEntry.task">
                    <span class="mx-1.5 text-surface-300">/</span>
                    {{ activeEntry.task.name }}
                </template>
            </p>

            <!-- Notes -->
            <p v-if="isRunning && activeEntry?.notes" class="mt-1 text-xs text-surface-400">
                {{ activeEntry.notes }}
            </p>
        </div>

        <!-- Controls -->
        <div class="px-6 py-4 bg-surface-50 border-t border-surface-100">
            <div class="flex items-center justify-center gap-3">
                <button
                    v-if="isRunning"
                    @click="stopTimer"
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-danger-500 hover:bg-danger-600 active:bg-danger-700 text-white rounded-lg text-sm font-medium shadow-sm transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger-500"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="6" y="6" width="12" height="12" rx="1" />
                    </svg>
                    Stop Timer
                </button>
                <template v-else>
                    <div v-if="projects.length > 0" class="flex flex-wrap items-center justify-center gap-2">
                        <button
                            v-for="project in projects.slice(0, 4)"
                            :key="project.id"
                            @click="startNewEntry(project.id)"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-brand-600 hover:bg-brand-700 active:bg-brand-800 text-white rounded-lg text-sm font-medium shadow-sm transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500"
                        >
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                            {{ project.name }}
                        </button>
                    </div>
                    <p v-else class="text-sm text-surface-400 py-1">
                        No projects yet. Create a project to start tracking time.
                    </p>
                </template>
            </div>
        </div>
    </div>
</template>
