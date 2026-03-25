<script setup>
const props = defineProps({
    modelValue: { type: [String, Number], default: '' },
    label: { type: String, default: null },
    type: { type: String, default: 'text' },
    error: { type: String, default: null },
    hint: { type: String, default: null },
    id: { type: String, default: null },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div>
        <label v-if="label" :for="id" class="block text-sm font-medium text-surface-700 mb-1.5">
            {{ label }}
        </label>
        <input
            :id="id"
            :type="type"
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            :class="[
                'block w-full rounded-lg border px-3 py-2 text-sm shadow-sm placeholder:text-surface-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 disabled:bg-surface-50 disabled:text-surface-500',
                error ? 'border-danger-500 text-danger-700' : 'border-surface-300 text-surface-900',
            ]"
            :aria-invalid="!!error"
            :aria-describedby="error && id ? `${id}-error` : undefined"
            v-bind="$attrs"
        />
        <p v-if="error" :id="id ? `${id}-error` : undefined" class="mt-1.5 text-sm text-danger-600" role="alert">
            {{ error }}
        </p>
        <p v-else-if="hint" class="mt-1.5 text-sm text-surface-500">{{ hint }}</p>
    </div>
</template>
