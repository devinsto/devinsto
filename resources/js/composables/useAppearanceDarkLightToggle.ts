import { ref, onMounted, onBeforeUnmount } from 'vue'

type Theme = 'light' | 'dark' | 'system'

const theme = ref<Theme>('system')
const isAnimating = ref(false)

const checkSystemTheme = (): Exclude<Theme, 'system'> =>
  window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'

/**
 * Applique un nouveau thème (light, dark, system)
 */
export function applyTheme(newTheme: Theme): void {
  isAnimating.value = true
  setTimeout(() => {
    const effective = newTheme === 'system' ? checkSystemTheme() : newTheme
    document.documentElement.classList.toggle('dark', effective === 'dark')
    localStorage.setItem('theme', newTheme)
    theme.value = newTheme
    isAnimating.value = false
  }, 300)
}

/**
 * Composable principal pour gérer le thème et son toggle
 */
export function useAppearanceDarkLightToggle() {
  const onSystemChange = () => {
    if (theme.value === 'system') applyTheme('system')
  }

  onMounted(() => {
    const saved = localStorage.getItem('theme') as Theme | null
    theme.value = saved || 'system'
    applyTheme(theme.value)
    window
      .matchMedia('(prefers-color-scheme: dark)')
      .addEventListener('change', onSystemChange)
  })

  onBeforeUnmount(() => {
    window
      .matchMedia('(prefers-color-scheme: dark)')
      .removeEventListener('change', onSystemChange)
  })

  const toggleTheme = (): void => {
    const next: Exclude<Theme, 'system'> = theme.value === 'dark' ? 'light' : 'dark'
    applyTheme(next)
  }

  return {
    theme,
    isAnimating,
    toggleTheme,
  }
}

