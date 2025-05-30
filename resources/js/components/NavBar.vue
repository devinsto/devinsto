<!-- resources/js/Components/NavBar.vue -->
<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import AppearanceDarkLightToggle from '@/components/AppearanceDarkLightToggle.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const open = ref(false);
const isDark = ref(false);

// Récupère l'utilisateur connecté depuis Inertia
const page = usePage<{ auth: { user: any } }>();
const user = page.props.auth.user;

// Initialiser le thème
onMounted(() => {
    const saved = localStorage.getItem('theme');
    if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        isDark.value = true;
        document.documentElement.classList.add('dark');
    }
});

// Vos liens principaux
interface NavLink {
    name: string;
    href: string;
}
const links: NavLink[] = [
    { name: 'Home', href: '/' },
    { name: 'À propos', href: '/about' },
    { name: 'Formations', href: '/courses' },
    { name: 'Blog', href: '/blog' },
];
</script>

<template>
    <nav class="bg-background border-border border-b">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo + Desktop Links -->
                <div class="flex items-center">
                    <Link href="/" class="mr-8 flex items-center">
                        <div class="flex h-8 w-8 items-center justify-center rounded-md pt-4">
                            <AppLogo class="text-primary-foreground dark:text-primary-foreground dim h-5 w-5 fill-current" />
                        </div>
                        <span class="text-primary ml-2 text-xl font-bold">Devinsto</span>
                    </Link>
                    <div class="hidden space-x-6 md:flex">
                        <Link v-for="link in links" :key="link.name" :href="link.href" class="text-foreground hover:text-primary transition">
                            {{ link.name }}
                        </Link>
                    </div>
                </div>

                <!-- Actions: Auth links + Theme + Mobile button -->
                <div class="flex items-center space-x-4">
                    <!-- Auth/Guest links (desktop) -->
                    <div class="hidden items-center space-x-4 md:flex">
                        <Link v-if="user" href="/dashboard" class="text-foreground hover:text-primary transition"> Dashboard </Link>
                        <template v-else>
                            <Link href="/login" class="text-foreground hover:text-primary transition"> Log in </Link>
                            <Link href="/register" class="text-foreground hover:text-primary transition"> Register </Link>
                        </template>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Intégration du composant AppearanceTabs -->
                        <AppearanceDarkLightToggle />
                    </div>

                    <!-- Mobile menu button -->
                    <button
                    @click="open = !open"
                    class="focus:ring-primary text-foreground hover:text-primary rounded p-2 focus:ring focus:outline-none md:hidden flex gap-1"
                    aria-label="Toggle menu"
                    >
                    Menu
                        <svg v-if="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div v-show="open" class="border-border bg-background border-t md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Main links -->
                <Link
                    v-for="link in [{ name: 'Devinsto.com', href: '/' }, ...links]"
                    :key="link.name"
                    :href="link.href"
                    @click="open = false"
                    class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition"
                >
                    <template v-if="link.name === 'Devinsto.com'">
                        <div class="inline-flex items-center">
                            <AppLogoIcon class="text-foreground dark:text-foreground h-5 w-5 fill-current" />
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
                        class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            href="/login"
                            @click="open = false"
                            class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition"
                        >
                            Log in
                        </Link>
                        <Link
                            href="/register"
                            @click="open = false"
                            class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition"
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
.dim {
    padding-top: 30%;
    transform: scale(0.3);
}
nav {
    background-color: var(--color-background);
    color: var(--color-foreground);
}
</style>
