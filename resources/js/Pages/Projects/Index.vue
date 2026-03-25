<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import UiButton from '../../Components/UiButton.vue';
import UiBadge from '../../Components/UiBadge.vue';
import UiModal from '../../Components/UiModal.vue';
import UiInput from '../../Components/UiInput.vue';
import UiEmptyState from '../../Components/UiEmptyState.vue';

const props = defineProps({
    projects: { type: Array, default: () => [] },
    organization: { type: Object, default: null },
});

const showCreateModal = ref(false);
const form = ref({
    name: '',
    description: '',
    color: '#6366f1',
    is_billable: false,
    hourly_rate: '',
});
const errors = ref({});
const processing = ref(false);

const statusVariant = (status) => {
    const map = { active: 'success', completed: 'default', archived: 'default' };
    return map[status] || 'default';
};

const projectColors = [
    '#6366f1', '#8b5cf6', '#ec4899', '#ef4444',
    '#f59e0b', '#22c55e', '#14b8a6', '#06b6d4',
];

const createProject = () => {
    processing.value = true;
    router.post(`/organizations/${props.organization?.id}/projects`, form.value, {
        preserveState: true,
        onSuccess: () => {
            showCreateModal.value = false;
            form.value = { name: '', description: '', color: '#6366f1', is_billable: false, hourly_rate: '' };
            errors.value = {};
        },
        onError: (e) => { errors.value = e; },
        onFinish: () => { processing.value = false; },
    });
};

const formatHours = (seconds) => {
    if (!seconds) return '0h';
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return h > 0 ? `${h}h ${m}m` : `${m}m`;
};
</script>

<template>
    <Head title="Projects" />
    <AppLayout>
        <template #header>Projects</template>
        <template #actions>
            <UiButton @click="showCreateModal = true">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                New Project
            </UiButton>
        </template>

        <!-- Project grid -->
        <div v-if="projects.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <a
                v-for="project in projects"
                :key="project.id"
                :href="`/projects/${project.id}`"
                class="bg-white rounded-xl border border-surface-200 shadow-card p-5 hover:shadow-dropdown hover:border-surface-300 transition-all group"
            >
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-3 h-3 rounded-full shrink-0"
                            :style="{ backgroundColor: project.color || '#6366f1' }"
                        />
                        <h3 class="text-sm font-semibold text-surface-900 group-hover:text-brand-600 transition-colors">
                            {{ project.name }}
                        </h3>
                    </div>
                    <UiBadge :variant="statusVariant(project.status)">
                        {{ project.status || 'active' }}
                    </UiBadge>
                </div>

                <p v-if="project.description" class="text-sm text-surface-500 line-clamp-2 mb-4">
                    {{ project.description }}
                </p>

                <div class="flex items-center gap-4 text-xs text-surface-400 pt-3 border-t border-surface-100">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ formatHours(project.total_duration) }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ project.tasks_count ?? 0 }} tasks
                    </span>
                    <span v-if="project.is_billable" class="flex items-center gap-1 text-success-600">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Billable
                    </span>
                </div>
            </a>
        </div>

        <!-- Empty state -->
        <div v-else class="bg-white rounded-xl border border-surface-200 shadow-card">
            <UiEmptyState
                title="No projects yet"
                description="Create your first project to start organizing and tracking time."
            >
                <template #icon>
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </template>
                <template #action>
                    <UiButton @click="showCreateModal = true">Create Project</UiButton>
                </template>
            </UiEmptyState>
        </div>

        <!-- Create Project Modal -->
        <UiModal :show="showCreateModal" @close="showCreateModal = false" max-width="md">
            <template #header>New Project</template>

            <form @submit.prevent="createProject" class="space-y-4">
                <UiInput
                    v-model="form.name"
                    label="Project Name"
                    id="project-name"
                    placeholder="e.g. Website Redesign"
                    :error="errors.name"
                    required
                />

                <div>
                    <label class="block text-sm font-medium text-surface-700 mb-1.5">Description</label>
                    <textarea
                        v-model="form.description"
                        rows="3"
                        class="block w-full rounded-lg border border-surface-300 px-3 py-2 text-sm shadow-sm placeholder:text-surface-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
                        placeholder="Brief project description..."
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-surface-700 mb-1.5">Color</label>
                    <div class="flex items-center gap-2">
                        <button
                            v-for="color in projectColors"
                            :key="color"
                            type="button"
                            @click="form.color = color"
                            :class="[
                                'w-7 h-7 rounded-full transition-all',
                                form.color === color ? 'ring-2 ring-offset-2 ring-brand-500 scale-110' : 'hover:scale-110',
                            ]"
                            :style="{ backgroundColor: color }"
                            :aria-label="`Select color ${color}`"
                        />
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" v-model="form.is_billable" class="rounded border-surface-300 text-brand-600 focus:ring-brand-500" />
                        <span class="text-sm text-surface-700">Billable project</span>
                    </label>
                </div>

                <UiInput
                    v-if="form.is_billable"
                    v-model="form.hourly_rate"
                    label="Hourly Rate"
                    id="hourly-rate"
                    type="number"
                    step="0.01"
                    min="0"
                    placeholder="0.00"
                    :error="errors.hourly_rate"
                />
            </form>

            <template #footer>
                <UiButton variant="ghost" @click="showCreateModal = false">Cancel</UiButton>
                <UiButton @click="createProject" :disabled="processing || !form.name">Create Project</UiButton>
            </template>
        </UiModal>
    </AppLayout>
</template>
