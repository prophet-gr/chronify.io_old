<script setup>
import { watch } from 'vue';

const props = defineProps({
    show: { type: Boolean, default: false },
    maxWidth: { type: String, default: 'lg' },
});

const emit = defineEmits(['close']);

const widths = {
    sm: 'max-w-sm',
    md: 'max-w-md',
    lg: 'max-w-lg',
    xl: 'max-w-xl',
    '2xl': 'max-w-2xl',
};

const close = () => emit('close');

watch(() => props.show, (value) => {
    document.body.style.overflow = value ? 'hidden' : '';
});
</script>

<template>
    <Teleport to="body">
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="show"
                class="fixed inset-0 z-50 overflow-y-auto"
                role="dialog"
                aria-modal="true"
                @keydown.escape="close"
            >
                <!-- Backdrop -->
                <div class="fixed inset-0 bg-surface-900/50" @click="close" aria-hidden="true" />

                <!-- Panel -->
                <div class="fixed inset-0 flex items-center justify-center p-4">
                    <Transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="opacity-0 scale-95"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-150"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-95"
                    >
                        <div
                            v-if="show"
                            :class="['w-full bg-white rounded-xl shadow-modal overflow-hidden', widths[maxWidth] || widths.lg]"
                            @click.stop
                        >
                            <!-- Header -->
                            <div v-if="$slots.header" class="flex items-center justify-between px-6 py-4 border-b border-surface-200">
                                <h3 class="text-lg font-semibold text-surface-900">
                                    <slot name="header" />
                                </h3>
                                <button @click="close" class="text-surface-400 hover:text-surface-600 p-1 rounded-lg" aria-label="Close">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Body -->
                            <div class="px-6 py-4">
                                <slot />
                            </div>

                            <!-- Footer -->
                            <div v-if="$slots.footer" class="flex items-center justify-end gap-3 px-6 py-4 border-t border-surface-200 bg-surface-50">
                                <slot name="footer" />
                            </div>
                        </div>
                    </Transition>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
