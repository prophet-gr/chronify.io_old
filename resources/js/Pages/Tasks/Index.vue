<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import AppLayout from '../../Layouts/AppLayout.vue';
import UiButton from '../../Components/UiButton.vue';
import UiBadge from '../../Components/UiBadge.vue';
import UiModal from '../../Components/UiModal.vue';
import UiInput from '../../Components/UiInput.vue';
import UiSelect from '../../Components/UiSelect.vue';
import UiEmptyState from '../../Components/UiEmptyState.vue';

const props = defineProps({
    tasks: { type: Array, default: () => [] },
    projects: { type: Array, default: () => [] },
    filters: { type: Object, default: () => ({}) },
});

const showCreateModal = ref(false);
const form = ref({
    name: '',
    description: '',
    project_id: '',
    status: 'todo',
});
const errors = ref({});
const processing = ref(false);
const activeFilter = ref(props.filters?.status || 'all');

const statusOptions = [
    { value: 'todo', label: 'To Do', variant: 'default' },
    { value: 'in_progress', label: 'In Progress', variant: 'brand' },
    { value: 'done', label: 'Done', variant: 'success' },
];

const statusVariant = (status) => {
    const map = { todo: 'default', in_progress: 'brand', done: 'success' };
    return map[status] || 'default';
};

const statusLabel = (status) => {
    const map = { todo: 'To Do', in_progress: 'In Progress', done: 'Done' };
    return map[status] || status;
};

const filteredTasks = computed(() => {
    if (activeFilter.value === 'all') return props.tasks;
    return props.tasks.filter(t => t.status === activeFilter.value);
});

const createTask = () => {
    processing.value = true;
    router.post(`/projects/${form.value.project_id}/tasks`, form.value, {
        preserveState: true,
        onSuccess: () => {
            showCreateModal.value = false;
            form.value = { name: '', description: '', project_id: '', status: 'todo' };
            errors.value = {};
        },
        onError: (e) => { errors.value = e; },
        onFinish: () => { processing.value = false; },
    });
};

const formatHours = (seconds) => {
    if (!seconds) return '—';
    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    return h > 0 ? `${h}h ${m}m` : `${m}m`;
};
</script>

<template>
    <Head title="Tasks" />
    <AppLayout>
        <template #header>Tasks</template>
        <template #actions>
            <UiButton @click="showCreateModal = true" :disabled="projects.length === 0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                New Task
            </UiButton>
        </template>

        <!-- Status filter tabs -->
        <div class="flex items-center gap-1 mb-4 bg-white rounded-lg border border-surface-200 p-1 w-fit">
            <button
                v-for="tab in [{ value: 'all', label: 'All' }, ...statusOptions]"
                :key="tab.value"
                @click="activeFilter = tab.value"
                :class="[
                    'px-3 py-1.5 text-sm font-medium rounded-md transition-colors',
                    activeFilter === tab.value
                        ? 'bg-brand-600 text-white shadow-sm'
                        : 'text-surface-600 hover:text-surface-900 hover:bg-surface-50',
                ]"
            >
                {{ tab.label }}
            </button>
        </div>

        <!-- Task list -->
        <div v-if="filteredTasks.length > 0" class="bg-white rounded-xl border border-surface-200 shadow-card overflow-hidden">
            <div class="divide-y divide-surface-100">
                <div
                    v-for="task in filteredTasks"
                    :key="task.id"
                    class="flex items-center gap-4 px-5 py-4 hover:bg-surface-50 transition-colors group"
                >
                    <!-- Status checkbox -->
                    <button
                        :class="[
                            'w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors',
                            task.status === 'done'
                                ? 'bg-success-500 border-success-500 text-white'
                                : 'border-surface-300 hover:border-brand-400',
                        ]"
                        :aria-label="task.status === 'done' ? 'Mark incomplete' : 'Mark complete'"
                    >
                        <svg v-if="task.status === 'done'" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </button>

                    <!-- Task info -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p :class="['text-sm font-medium', task.status === 'done' ? 'line-through text-surface-400' : 'text-surface-900']">
                                {{ task.name }}
                            </p>
                            <UiBadge v-if="task.status !== 'done'" :variant="statusVariant(task.status)" size="sm">
                                {{ statusLabel(task.status) }}
                            </UiBadge>
                        </div>
                        <div class="flex items-center gap-3 mt-1">
                            <span v-if="task.project" class="flex items-center gap-1.5 text-xs text-surface-400">
                                <span class="w-2 h-2 rounded-full" :style="{ backgroundColor: task.project.color || '#6366f1' }" />
                                {{ task.project.name }}
                            </span>
                            <span v-if="task.total_duration" class="text-xs text-surface-400">
                                {{ formatHours(task.total_duration) }}
                            </span>
                        </div>
                    </div>

                    <!-- Billable indicator -->
                    <UiBadge v-if="task.is_billable" variant="success" size="sm">$</UiBadge>
                </div>
            </div>
        </div>

        <!-- Empty state -->
        <div v-else class="bg-white rounded-xl border border-surface-200 shadow-card">
            <UiEmptyState
                :title="activeFilter === 'all' ? 'No tasks yet' : `No ${statusLabel(activeFilter).toLowerCase()} tasks`"
                :description="activeFilter === 'all' ? 'Create tasks to organize your work within projects.' : 'Try a different filter or create a new task.'"
            >
                <template #icon>
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </template>
                <template v-if="activeFilter === 'all'" #action>
                    <UiButton @click="showCreateModal = true" :disabled="projects.length === 0">Create Task</UiButton>
                </template>
            </UiEmptyState>
        </div>

        <!-- Create Task Modal -->
        <UiModal :show="showCreateModal" @close="showCreateModal = false" max-width="md">
            <template #header>New Task</template>

            <form @submit.prevent="createTask" class="space-y-4">
                <UiSelect
                    v-model="form.project_id"
                    label="Project"
                    id="task-project"
                    :error="errors.project_id"
                    required
                >
                    <option value="" disabled>Select a project...</option>
                    <option v-for="project in projects" :key="project.id" :value="project.id">
                        {{ project.name }}
                    </option>
                </UiSelect>

                <UiInput
                    v-model="form.name"
                    label="Task Name"
                    id="task-name"
                    placeholder="e.g. Design homepage mockup"
                    :error="errors.name"
                    required
                />

                <div>
                    <label class="block text-sm font-medium text-surface-700 mb-1.5">Description</label>
                    <textarea
                        v-model="form.description"
                        rows="3"
                        class="block w-full rounded-lg border border-surface-300 px-3 py-2 text-sm shadow-sm placeholder:text-surface-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
                        placeholder="Task details..."
                    />
                </div>
            </form>

            <template #footer>
                <UiButton variant="ghost" @click="showCreateModal = false">Cancel</UiButton>
                <UiButton @click="createTask" :disabled="processing || !form.name || !form.project_id">Create Task</UiButton>
            </template>
        </UiModal>
    </AppLayout>
</template>
