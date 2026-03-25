<script setup>
defineProps({
    modelValue: { type: [String, Number], default: '' },
    label: { type: String, default: null },
    error: { type: String, default: null },
    id: { type: String, default: null },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div>
        <label v-if="label" :for="id" class="block text-sm font-medium text-surface-700 mb-1.5">
            {{ label }}
        </label>
        <select
            :id="id"
            :value="modelValue"
            @change="emit('update:modelValue', $event.target.value)"
            :class="[
                'block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 disabled:bg-surface-50 disabled:text-surface-500',
                error ? 'border-danger-500' : 'border-surface-300 text-surface-900',
            ]"
            v-bind="$attrs"
        >
            <slot />
        </select>
        <p v-if="error" class="mt-1.5 text-sm text-danger-600" role="alert">{{ error }}</p>
    </div>
</template>
