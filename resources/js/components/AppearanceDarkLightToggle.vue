<script setup lang="ts">
import { Moon, Sun } from 'lucide-vue-next'
import { ref, onMounted, onBeforeUnmount } from 'vue'

type Theme = 'light' | 'dark' | 'system'
const theme = ref<Theme>('system')
const isAnimating = ref(false)

// Gestion plus précise du type système
const checkSystemTheme = (): Exclude<Theme, 'system'> => {
  return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
}

// Applique le thème avec une gestion d'erreur
const applyTheme = (newTheme: Theme): void => {
  try {
    isAnimating.value = true
    
    setTimeout(() => {
      const themeToApply = newTheme === 'system' ? checkSystemTheme() : newTheme
      document.documentElement.classList.toggle('dark', themeToApply === 'dark')
      
      localStorage.setItem('theme', newTheme)
      theme.value = newTheme
      isAnimating.value = false
    }, 300)
  } catch (error) {
    console.error('Erreur lors du changement de thème :', error)
    isAnimating.value = false
  }
}

// Détection du thème système avec cleanup
const systemThemeListener = (e: MediaQueryListEvent) => {
  if (theme.value === 'system') {
    applyTheme('system')
  }
}

onMounted(() => {
  const savedTheme = localStorage.getItem('theme') as Theme | null
  theme.value = savedTheme || 'system'
  applyTheme(theme.value)
  
  window.matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', systemThemeListener)
})

onBeforeUnmount(() => {
  window.matchMedia('(prefers-color-scheme: dark)')
    .removeEventListener('change', systemThemeListener)
})

const toggleTheme = (): void => {
  const newTheme: Exclude<Theme, 'system'> = theme.value === 'dark' ? 'light' : 'dark'
  applyTheme(newTheme)
}
</script>

<template>
  <button
    @click="toggleTheme"
    class="relative flex items-center justify-center cursor-pointer w-12 h-8 rounded-full bg-neutral-200 dark:bg-neutral-700 overflow-hidden transition-colors"
    :aria-pressed="theme !== 'light'"
    aria-label="Toggle color scheme"
  >
    <div class="relative flex items-center h-full w-full">
      <!-- Icône active avec meilleure gestion des transitions -->
      <component
        :is="theme === 'dark' ? Moon : Sun"
        :class="[
          'absolute h-6 w-6 p-1 rounded-full transition-all duration-300 transform',
          'bg-white dark:bg-neutral-800 shadow-md',
          theme === 'light' ? 'translate-x-1 text-yellow-500' : 'translate-x-6 text-indigo-300',
          { 'animate-pulse-fast': isAnimating }
        ]"
        aria-hidden="true"
      />
      
      <!-- Icône inactive avec meilleure sémantique -->
      <component
        :is="theme === 'dark' ? Sun : Moon"
        :class="[
          'absolute h-4 w-4 opacity-40 transition-opacity',
          theme === 'light' ? 'left-7 text-gray-500' : 'left-1 text-gray-400'
        ]"
        aria-hidden="true"
      />
    </div>
  </button>
</template>

<style>
.animate-pulse-fast {
  animation: pulse 0.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(0.95); opacity: 0.8; }
}

/* Amélioration pour le mode sombre */
.dark .animate-pulse-fast {
  animation-timing-function: cubic-bezier(0.2, 0, 0.38, 0.9);
}
</style>
