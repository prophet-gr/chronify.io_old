<script setup>
import { computed } from 'vue';

const props = defineProps({
    variant: { type: String, default: 'default' },
    size: { type: String, default: 'sm' },
});

const variants = {
    default: 'bg-surface-100 text-surface-700',
    brand: 'bg-brand-100 text-brand-700',
    success: 'bg-success-50 text-success-700',
    warning: 'bg-warning-50 text-warning-700',
    danger: 'bg-danger-50 text-danger-700',
};

const sizes = {
    sm: 'text-xs px-2 py-0.5',
    md: 'text-sm px-2.5 py-0.5',
};

const classes = computed(() => [
    'inline-flex items-center font-medium rounded-full',
    variants[props.variant] || variants.default,
    sizes[props.size] || sizes.sm,
]);
</script>

<template>
    <span :class="classes">
        <slot />
    </span>
</template>
