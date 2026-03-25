<script setup>
defineProps({
    title: { type: String, default: 'No items' },
    description: { type: String, default: null },
});
</script>

<template>
    <div class="flex flex-col items-center justify-center py-12 text-center">
        <div v-if="$slots.icon" class="mb-4 text-surface-300">
            <slot name="icon" />
        </div>
        <h3 class="text-sm font-medium text-surface-900">{{ title }}</h3>
        <p v-if="description" class="mt-1 text-sm text-surface-500">{{ description }}</p>
        <div v-if="$slots.action" class="mt-4">
            <slot name="action" />
        </div>
    </div>
</template>
