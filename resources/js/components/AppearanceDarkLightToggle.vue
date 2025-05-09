<script setup lang="ts">
import { Moon, Sun } from 'lucide-vue-next';
import { ref, onMounted } from 'vue';

const theme = ref<'light' | 'dark' | 'system'>('system');
const isAnimating = ref(false);

const checkSystemTheme = () => {
  return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
};

const applyTheme = (newTheme: 'light' | 'dark' | 'system') => {
  isAnimating.value = true;
  
  setTimeout(() => {
    let themeToApply = newTheme === 'system' ? checkSystemTheme() : newTheme;
    
    if (themeToApply === 'dark') {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
    
    localStorage.setItem('theme', newTheme);
    theme.value = newTheme;
    isAnimating.value = false;
  }, 300);
};

onMounted(() => {
  const savedTheme = localStorage.getItem('theme') as 'light' | 'dark' | 'system' | null;
  theme.value = savedTheme || 'system';
  applyTheme(theme.value);
  
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    if (theme.value === 'system') {
      applyTheme('system');
    }
  });
});

const toggleTheme = () => {
  const newTheme = theme.value === 'dark' ? 'light' : 'dark';
  applyTheme(newTheme);
};
</script>

<template>
  <button
    @click="toggleTheme"
    class="relative flex items-center justify-center w-12 h-8 rounded-full bg-neutral-200 dark:bg-neutral-700 overflow-hidden transition-colors"
    aria-label="Toggle theme"
  >
    <!-- Conteneur pour l'animation -->
    <div class="relative flex items-center h-full w-full">
      <!-- Icône active (devenant le cercle animé) -->
      <component
        :is="theme === 'dark' ? Moon : Sun"
        :class="[
          'absolute h-6 w-6 p-1 rounded-full transition-all duration-300',
          'bg-white dark:bg-neutral-800 shadow-md',
          theme === 'light' ? 'translate-x-1 text-yellow-500' : 'translate-x-6 text-indigo-300',
          isAnimating ? 'animate-pulse-fast' : ''
        ]"
      />
      
      <!-- Icône inactive (faded en arrière-plan) -->
      <component
        :is="theme === 'dark' ? Sun : Moon"
        class="absolute h-4 w-4 opacity-40 transition-opacity"
        :class="[
          theme === 'light' ? 'left-7 text-gray-500' : 'left-1 text-gray-400'
        ]"
      />
    </div>
  </button>
</template>

<style>
.animate-pulse-fast {
  animation: pulse 0.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.7; }
}
</style>
