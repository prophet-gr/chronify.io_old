<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    variant: { type: String, default: 'primary' },
    size: { type: String, default: 'md' },
    href: { type: String, default: null },
    disabled: { type: Boolean, default: false },
    type: { type: String, default: 'button' },
});

const variants = {
    primary: 'bg-brand-600 text-white hover:bg-brand-700 active:bg-brand-800 focus-visible:outline-brand-500',
    secondary: 'bg-white text-surface-700 hover:bg-surface-50 active:bg-surface-100 border border-surface-300 focus-visible:outline-brand-500',
    danger: 'bg-danger-600 text-white hover:bg-danger-700 active:bg-danger-700 focus-visible:outline-danger-500',
    ghost: 'text-surface-600 hover:bg-surface-100 active:bg-surface-200 focus-visible:outline-brand-500',
    success: 'bg-success-600 text-white hover:bg-success-700 active:bg-success-700 focus-visible:outline-success-500',
};

const sizes = {
    sm: 'text-sm px-3 py-1.5 gap-1.5',
    md: 'text-sm px-4 py-2 gap-2',
    lg: 'text-base px-5 py-2.5 gap-2',
};

const classes = computed(() => [
    'inline-flex items-center justify-center font-medium rounded-lg transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 disabled:opacity-50 disabled:pointer-events-none',
    variants[props.variant] || variants.primary,
    sizes[props.size] || sizes.md,
]);
</script>

<template>
    <Link v-if="href" :href="href" :class="classes">
        <slot />
    </Link>
    <button v-else :type="type" :disabled="disabled" :class="classes">
        <slot />
    </button>
</template>
