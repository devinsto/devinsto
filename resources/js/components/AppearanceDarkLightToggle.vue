<script setup lang="ts">
import { useAppearanceDarkLightToggle } from '@/composables/useAppearanceDarkLightToggle';
import { Moon, Sun } from 'lucide-vue-next';

const { theme, toggleTheme } = useAppearanceDarkLightToggle();
</script>
<template>
    <!-- Bouton bascule de thème -->
    <button
        @click="toggleTheme"
        class="group relative flex h-6 w-12 cursor-pointer items-center justify-center overflow-visible rounded-full bg-neutral-200 transition-colors hover:border-1 hover:border-green-200 dark:bg-neutral-700"
        :aria-pressed="theme !== 'light'"
        aria-label="Toggle color scheme"
    >
        <!-- Icône correspondant au thème actif -->
        <component
            :is="theme === 'dark' ? Moon : Sun"
            class="absolute h-5 w-5 transform overflow-hidden rounded-full bg-white p-1 shadow-md transition-all duration-300 dark:bg-neutral-800"
            :class="[theme === 'light' ? 'left-1 text-yellow-500' : 'right-1 text-green-300']"
            aria-hidden="true"
        />
        <!-- Tooltip affiché en dessous au survol -->
        <span
            class="pointer-events-none absolute top-full left-0 z-50 mt-1 -translate-x-0 transform rounded-md bg-white px-2 py-1 text-xs whitespace-nowrap text-black opacity-0 transition-opacity duration-200 group-hover:opacity-100"
        >
            {{ theme === 'dark' ? 'Passer au thème clair' : 'Passer au thème sombre' }}
        </span>
    </button>
</template>

<style>
/* Animation de pulsation rapide pour la transition visuelle */
.animate-pulse-fast {
    animation: pulse 0.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
@keyframes pulse {
    0%,
    100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(0.95);
        opacity: 0.8;
    }
}
</style>
