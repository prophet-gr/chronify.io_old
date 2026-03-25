<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '../../Layouts/AppLayout.vue';

const props = defineProps({
    projects: { type: Array, default: () => [] },
});

const formatHours = (seconds) => {
    if (!seconds) return '0h 0m';
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return h > 0 ? `${h}h ${m}m` : `${m}m`;
};
</script>

<template>
    <Head title="Projects" />
    <AppLayout>
        <template #header>Projects</template>

        <div v-if="projects.length === 0" class="bg-white rounded-xl shadow-card border border-surface-200 p-12 text-center">
            <svg class="mx-auto w-12 h-12 text-surface-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
            <h3 class="mt-4 text-sm font-medium text-surface-900">No projects</h3>
            <p class="mt-1 text-sm text-surface-500">Projects will appear here once your organization creates them via the API.</p>
        </div>

        <div v-else class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div
                v-for="project in projects"
                :key="project.id"
                class="bg-white rounded-xl shadow-card border border-surface-200 p-6 hover:shadow-dropdown transition-shadow"
            >
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full" :style="{ backgroundColor: project.color || '#6366f1' }" />
                        <h3 class="text-base font-semibold text-surface-900">{{ project.name }}</h3>
                    </div>
                    <span
                        :class="[
                            'px-2 py-0.5 rounded-full text-xs font-medium',
                            project.status === 'active' ? 'bg-success-50 text-success-700' : 'bg-surface-100 text-surface-500'
                        ]"
                    >
                        {{ project.status || 'active' }}
                    </span>
                </div>

                <p v-if="project.description" class="mt-2 text-sm text-surface-500 line-clamp-2">{{ project.description }}</p>

                <div class="mt-4 pt-4 border-t border-surface-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-surface-400 uppercase">Total Time</p>
                        <p class="text-lg font-semibold text-surface-900 font-mono">{{ formatHours(project.total_duration) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-surface-400 uppercase">Tasks</p>
                        <p class="text-lg font-semibold text-surface-900">{{ project.tasks_count ?? 0 }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-surface-400 uppercase">Entries</p>
                        <p class="text-lg font-semibold text-surface-900">{{ project.entries_count ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
