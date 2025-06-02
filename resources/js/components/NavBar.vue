<!-- resources/js/Components/headerBar.vue -->
<script setup lang="ts">

import AppearanceDarkLightToggle from '@/components/AppearanceDarkLightToggle.vue';
import { Link, usePage, router } from '@inertiajs/vue3';
import { onBeforeUnmount, onMounted, ref } from 'vue';
import AppLogo from './AppLogo.vue';
import { LogOut } from 'lucide-vue-next';

const open = ref(false);
const isDark = ref(false);
const hasShadow = ref(false);
const handleLogout = () => {
    router.flushAll();
};

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

// Ombre au scroll
const handleScroll = () => {
    hasShadow.value = window.scrollY > 10;
};
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});
onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
});

// Vos liens principaux
interface headerLink {
    name: string;
    href: string;
}
const links: headerLink[] = [
    { name: 'Home', href: '/' },
    { name: 'À propos', href: '/about' },
    { name: 'Formations', href: '/courses' },
    { name: 'Blog', href: '/blog' },
];
</script>

<template>

    <header
        :class="['sticky top-0 z-50 bg-white  overflow-hidden dark:bg-gray-900 border-border border-b transition-shadow', hasShadow ? 'shadow-lg' : 'shadow-none']">
        <div class="topHead h-10 bg-[#0a5d3b]  sm:px-6 lg:py-8 md:py-8 flex items-center justify-center">
            <div class="hos text-[#eefff5]">
                <div style="">
                    <a href="https://hostinger.fr/?REFERRALCODE=1ROSTO35" target="_blank" rel="noopener" aria-label="Hostinger" class="">
                        <div class="flex items-center justify-center">
                            <span class=" md:inline-block mx-2 text-xl">  -20% </span> 
                            <span class=" md:inline-block mx-2 text-lg"> d'hébergement chez  </span> 
                            <div class="flex  gap-2 ">
                                <svg style="color:#fff;" class="w-6 h-6" clip-rule="evenodd" fill-rule="evenodd" height="2500"
                                    stroke-linejoin="round" stroke-miterlimit="2" viewBox="7.002 8.287 148.203 175.426"
                                    width="2112" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m7.002 8.287 39.319 21.172v39.32h57.467l36.295 21.172h-133.081zm148.203 75.615v-54.443l-42.344-21.172v51.418zm0 99.811-39.319-21.172v-39.32h-57.467l-36.295-21.172h133.081zm-148.203-75.615v54.443l42.343 21.172v-51.418z"
                                        fill="#fff" />
                                </svg>

                                <span
                                    style="color:#fff; font-weight:bold; font-family:system-ui, sans-serif; font-size: 1.2rem;">Hostinger</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <nav class="mx-auto max-w-[95rem] px-4 sm:px-6 lg:px-8 ">
            <div class="flex h-16 items-center justify-between ">
                <!-- Logo + Desktop Links -->
                <Link href="/" prefetch class="mr-8 flex items-center">
                <div class="flex h-8 w-8 items-center justify-center rounded-md pt-9">
                    <AppLogo class="text-primary-foreground dark:text-primary-foreground dim h-5 w-5 fill-current" />
                </div>
                <span class="text-primary ml-2 text-xl font-bold">Devinsto</span>
                </Link>
                <div class="flex items-center ">
                    <div class="hidden space-x-6 md:flex">
                        <Link v-for="link in links" prefetch :key="link.name" :href="link.href"
                            class="text-foreground hover:text-primary transition">
                        {{ link.name }}
                        </Link>
                    </div>
                </div>

                <!-- Actions: Auth links + Theme + Mobile button -->
                <div class="flex items-center space-x-4">
                    <!-- Auth/Guest links (desktop) -->
                    <div class="hidden items-center space-x-4 md:flex">
                        <div class="flex items-center gap-4">
                            <!-- Intégration du composant AppearanceTabs -->
                            <AppearanceDarkLightToggle /> |
                        </div>
                        <div v-if="user" class="flex gap-5">

                            <Link href="/dashboard" prefetch class=" hover:text-primary transition">
                            Dashboard </Link>

                            <Link class="block w-full text-[#FF2D55]" method="post" :href="route('logout')"
                                @click="handleLogout" prefetch as="button">
                            <LogOut class="mr-2 h-4 w-4 cursor-pointer" />

                            </Link>
                        </div>

                        <template v-else>
                            <Link href="/login" prefetch class="text-foreground hover:text-primary transition"> Log in
                            </Link>
                            <Link href="/register" prefetch class="text-foreground hover:text-primary transition">
                            Register </Link>
                        </template>
                    </div>



                    <!-- Mobile menu button -->
                    <button @click="open = !open"
                        class="focus:ring-primary text-foreground hover:text-primary rounded p-2 focus:ring focus:outline-none md:hidden flex gap-1"
                        aria-label="Toggle menu">
                        Menu
                        <svg v-if="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Mobile menu -->
        <div v-show="open" class="border-border bg-background border-t md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Main links -->
                <Link v-for="link in [{ name: 'Devinsto.com', href: '/' }, ...links]" :key="link.name" :href="link.href"
                    @click="open = false" prefetch
                    class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition">
                <template v-if="link.name === 'Devinsto.com'">
                    Profil
                </template>
                <template v-else>{{ link.name }}</template>
                </Link>

                <!-- Auth links -->
                <div>
                    <div v-if="user" class="grid gap-3">

                        <Link href="/dashboard" prefetch class=" hover:text-primary transition ">
                        Dashboard </Link>

                        <Link class="block w-full text-red-600" method="post" :href="route('logout')"
                            @click="handleLogout" prefetch as="button">
                        <LogOut class="mr-2 h-4 w-4 cursor-pointer" />

                        </Link>
                    </div>
                    <template v-else>
                        <Link href="/login" @click="open = false" prefetch
                            class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition">
                        Log in
                        </Link>
                        <Link href="/register" @click="open = false" prefetch
                            class="text-foreground hover:bg-muted hover:text-primary block rounded-md px-3 py-2 text-base font-medium transition">
                        Register
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </header>
</template>

<style scoped>
.topHead {
    background: linear-gradient(270deg, #062d1d, #086928, #1e8c02, #FF2D55);
    background-size: 400% 400%;
    animation: gradientAnimation 10s ease infinite;
}

@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}

.dim {
    /* padding-top: 30%; */
    transform: scale(0.3) !important;
}
</style>
