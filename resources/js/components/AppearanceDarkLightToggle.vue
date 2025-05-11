<script setup lang="ts">
import { Moon, Sun } from 'lucide-vue-next'
import { useAppearanceDarkLightToggle } from '@/composables/useAppearanceDarkLightToggle'

const { theme, toggleTheme } = useAppearanceDarkLightToggle()
</script>
<template>
  <!-- Bouton bascule de thème -->
  <button
    @click="toggleTheme"
    class="group relative flex items-center justify-center w-10 h-6 rounded-full
           bg-neutral-200 dark:bg-neutral-700 overflow-visible cursor-pointer
           transition-colors hover:border-1 hover:border-green-200"
    :aria-pressed="theme !== 'light'"
    aria-label="Toggle color scheme"
  >
    <!-- Icône correspondant au thème actif -->
    <component
      :is="theme === 'dark' ? Moon : Sun"
      class="absolute h-5 w-5 p-1 rounded-full transition-all duration-300
             transform bg-white dark:bg-neutral-800 shadow-md overflow-hidden"
      :class="[
        theme === 'light' ? 'left-1 text-yellow-500' : 'right-1 text-green-300'
      ]"
      aria-hidden="true"
    />
    <!-- Tooltip affiché en dessous au survol -->
    <span
      class="pointer-events-none absolute left-0 transform -translate-x-0
             top-full mt-1 whitespace-nowrap bg-white text-black text-xs
             rounded-md px-2 py-1 opacity-0 group-hover:opacity-100
             transition-opacity duration-200 z-50"
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
  0%, 100% { transform: scale(1); opacity: 1; }
  50%      { transform: scale(0.95); opacity: 0.8; }
}
</style>
