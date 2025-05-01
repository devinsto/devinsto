<!-- resources/js/Components/NavBar.vue -->
<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import AppLogo from '@/components/AppLogo.vue'

const open = ref(false)
const isDark = ref(false)

// Récupère l'utilisateur connecté depuis Inertia
const page = usePage<{ auth: { user: any } }>()
const user = page.props.auth.user

// Initialiser le thème
onMounted(() => {
  const saved = localStorage.getItem('theme')
  if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    isDark.value = true
    document.documentElement.classList.add('dark')
  }
})

function toggleTheme() {
  isDark.value = !isDark.value
  document.documentElement.classList.toggle('dark', isDark.value)
  localStorage.setItem('theme', isDark.value ? 'dark' : 'light')
}

// Vos liens principaux
interface NavLink { name: string; href: string }
const links: NavLink[] = [
  { name: 'Home',      href: '/'       },
  { name: 'À propos',  href: '/about'  },
  { name: 'Formations', href: '/courses' },
  { name: 'Blog',      href: '/blog'   },
]
</script>

<template>
  <nav class="bg-background border-b border-border">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <!-- Logo + Desktop Links -->
        <div class="flex items-center">
          <Link href="/" class="flex items-center mr-8">
            <div class=" w-8 h-8 flex items-center justify-center rounded-md pt-4">
              <AppLogo class="w-5 h-5 fill-current text-primary-foreground dark:text-primary-foreground dim" />
            </div>
            <span class="ml-2 text-primary font-bold text-xl">Devinsto</span>
          </Link>
          <div class="hidden md:flex space-x-6">
            <Link
              v-for="link in links"
              :key="link.name"
              :href="link.href"
              class="text-foreground hover:text-primary transition"
            >
              {{ link.name }}
            </Link>
          </div>
        </div>

        <!-- Actions: Auth links + Theme + Mobile button -->
        <div class="flex items-center space-x-4">
          <!-- Auth/Guest links (desktop) -->
          <div class="hidden md:flex items-center space-x-4">
            <Link
              v-if="user"
              href="/dashboard"
              class="text-foreground hover:text-primary transition"
            >
              Dashboard
            </Link>
            <template v-else>
              <Link
                href="/login"
                class="text-foreground hover:text-primary transition"
              >
                Log in
              </Link>
              <Link
                href="/register"
                class="text-foreground hover:text-primary transition"
              >
                Register
              </Link>
            </template>
          </div>

          <!-- Toggle dark/light -->
          <button
            @click="toggleTheme"
            class="p-2 rounded focus:outline-none focus:ring focus:ring-primary"
            :aria-label="isDark ? 'Switch to light mode' : 'Switch to dark mode'"
          >
            <svg v-if="!isDark" class="h-6 w-6 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v1m0 16v1M4.22 4.22l.707.707m12.02 12.02l.707.707M1 12h1m16 0h1M4.22 19.78l.707-.707m12.02-12.02l.707-.707M12 5a7 7 0 100 14a7 7 0 000-14z"/>
            </svg>
            <svg v-else class="h-6 w-6 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 12.79A9 9 0 1111.21 3A7 7 0 0021 12.79z"/>
            </svg>
          </button>

          <!-- Mobile menu button -->
          <button
            @click="open = !open"
            class="md:hidden p-2 rounded focus:outline-none focus:ring focus:ring-primary text-foreground hover:text-primary"
            aria-label="Toggle menu"
          >
            <svg v-if="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg v-else class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div v-show="open" class="md:hidden border-t border-border bg-background">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Main links -->
        <Link
          v-for="link in [{ name: 'Devinsto.com', href: '/' }, ...links]"
          :key="link.name"
          :href="link.href"
          @click="open = false"
          class="block px-3 py-2 rounded-md text-base font-medium text-foreground hover:bg-muted hover:text-primary transition"
        >
          <template v-if="link.name === 'Devinsto.com'">
            <div class="inline-flex items-center">
              <AppLogoIcon class="w-5 h-5 fill-current text-foreground dark:text-foreground" />
              <span class="ml-2">Devinsto.com</span>
            </div>
          </template>
          <template v-else>{{ link.name }}</template>
        </Link>

        <!-- Auth links -->
        <div>
          <Link
            v-if="user"
            href="/dashboard"
            @click="open = false"
            class="block px-3 py-2 rounded-md text-base font-medium text-foreground hover:bg-muted hover:text-primary transition"
          >
            Dashboard
          </Link>
          <template v-else>
            <Link
              href="/login"
              @click="open = false"
              class="block px-3 py-2 rounded-md text-base font-medium text-foreground hover:bg-muted hover:text-primary transition"
            >
              Log in
            </Link>
            <Link
              href="/register"
              @click="open = false"
              class="block px-3 py-2 rounded-md text-base font-medium text-foreground hover:bg-muted hover:text-primary transition"
            >
              Register
            </Link>
          </template>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.dim{
    padding-top: 30%;
    transform: scale(0.3);
}
</style>
