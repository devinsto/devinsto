<template>
  <nav class="bg-background shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Logo -->
        <div class="flex items-center">
          <inertia-link href="/" class="flex-shrink-0">
            <span class="text-2xl font-bold text-primary">logoApp</span>
          </inertia-link>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex md:items-center md:space-x-4">
          <inertia-link
            v-for="link in links"
            :key="link.name"
            :href="link.href"
            class="px-3 py-2 text-sm font-medium rounded-md transition-colors"
            :class="{
              'text-primary bg-muted': $page.url === link.href,
              'text-foreground hover:text-primary hover:bg-muted': $page.url !== link.href,
            }"
            :aria-current="$page.url === link.href ? 'page' : undefined"
          >
            {{ link.name }}
          </inertia-link>
          <template v-if="$page.props.auth.user">
            <inertia-link
              :href="route('dashboard')"
              class="px-3 py-2 text-sm font-medium rounded-md transition-colors text-foreground hover:text-primary hover:bg-muted"
            >
              Dashboard
            </inertia-link>
          </template>
          <template v-else>
            <inertia-link
              :href="route('login')"
              class="px-3 py-2 text-sm font-medium rounded-md transition-colors text-foreground hover:text-primary hover:bg-muted"
            >
              Log in
            </inertia-link>
            <inertia-link
              :href="route('register')"
              class="px-3 py-2 text-sm font-medium rounded-md transition-colors text-foreground hover:text-primary hover:bg-muted"
            >
              Register
            </inertia-link>
          </template>
        </div>

        <!-- Mobile Menu Button -->
        <div class="flex items-center md:hidden">
          <button
            @click="toggleMenu"
            type="button"
            class="inline-flex items-center justify-center p-2 rounded-md text-foreground hover:text-primary hover:bg-muted focus:outline-none focus:ring-2 focus:ring-primary"
            aria-controls="mobile-menu"
            :aria-expanded="isOpen"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              class="h-6 w-6"
              :class="{ 'hidden': isOpen, 'block': !isOpen }"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg
              class="h-6 w-6"
              :class="{ 'block': isOpen, 'hidden': !isOpen }"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div v-if="isOpen" class="md:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <inertia-link
          v-for="link in links"
          :key="link.name"
          :href="link.href"
          class="block px-3 py-2 text-base font-medium rounded-md transition-colors"
          :class="{
            'text-primary bg-muted': $page.url === link.href,
            'text-foreground hover:text-primary hover:bg-muted': $page.url !== link.href,
          }"
          :aria-current="$page.url === link.href ? 'page' : undefined"
          @click="toggleMenu"
        >
          {{ link.name }}
        </inertia-link>
        <template v-if="$page.props.auth.user">
          <inertia-link
            :href="route('dashboard')"
            class="block px-3 py-2 text-base font-medium rounded-md transition-colors text-foreground hover:text-primary hover:bg-muted"
            @click="toggleMenu"
          >
            Dashboard
          </inertia-link>
        </template>
        <template v-else>
          <inertia-link
            :href="route('login')"
            class="block px-3 py-2 text-base font-medium rounded-md transition-colors text-foreground hover:text-primary hover:bg-muted"
            @click="toggleMenu"
          >
            Log in
          </inertia-link>
          <inertia-link
            :href="route('register')"
            class="block px-3 py-2 text-base font-medium rounded-md transition-colors text-foreground hover:text-primary hover:bg-muted"
            @click="toggleMenu"
          >
            Register
          </inertia-link>
        </template>
      </div>
    </div>
  </nav>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { Link } from '@inertiajs/vue3';

export default defineComponent({
  components: { InertiaLink: Link },
  setup() {
    const isOpen = ref(false);
    const links = ref([
      { name: 'Home', href: '/' },
      { name: 'À propos', href: '/about' },
      { name: 'Formations', href: '/formations' },
      { name: 'Blog', href: '/blog' },
    ]);

    const toggleMenu = () => {
      isOpen.value = !isOpen.value;
    };

    return { isOpen, links, toggleMenu };
  },
});
</script>
