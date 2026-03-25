<script setup>
defineProps({
    title: { type: String, required: true },
    value: { type: String, required: true },
    subtitle: { type: String, default: null },
    icon: { type: String, default: 'clock' },
});
</script>

<template>
    <div class="bg-white rounded-xl shadow-card border border-surface-200 p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-surface-500 uppercase tracking-wide">{{ title }}</h3>
            <div class="w-10 h-10 bg-brand-50 rounded-lg flex items-center justify-center">
                <svg v-if="icon === 'clock'" class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <svg v-else-if="icon === 'calendar'" class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <svg v-else-if="icon === 'folder'" class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                <svg v-else class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </div>
        </div>
        <p class="mt-4 text-3xl font-semibold text-surface-900">{{ value }}</p>
        <p v-if="subtitle" class="mt-1 text-sm text-surface-500">{{ subtitle }}</p>
    </div>
</template>
