<script setup lang="ts">
import Heading from '@/components/Heading.vue';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { type NavItem } from '@/types';
import { PageProps as InertiaPageProps } from '@inertiajs/core';
import { Link, usePage } from '@inertiajs/vue3';


// Étendez les props de base d'Inertia
interface SharedPageProps extends InertiaPageProps {
  ziggy?: {
    location: string;
    // Ajoutez d'autres propriétés Ziggy si nécessaire
  };
}

const sidebarNavItems: NavItem[] = [
    {
        title: 'Profile',
        href: '/settings/profile',
    },
    {
        title: 'Password',
        href: '/settings/password',
    },
    {
        title: 'Appearance',
        href: '/settings/appearance',
    },
];

// Utilisation du typage
const page = usePage<SharedPageProps>();

const currentPath = page.props.ziggy?.location 
  ? new URL(page.props.ziggy.location).pathname 
  : '';
</script>

<template>
    <div class="px-4 py-6 bg">
        <Heading title="Settings" description="Manage your profile and account settings" />
 
        <div class="flex flex-col space-y-8 md:space-y-0 lg:flex-row lg:space-y-0 lg:space-x-12">
            <aside class="w-full max-w-xl lg:w-48">
                
                <!-- <div v-if="backendUser.value && backendUser.value.avatar" class="flex justify-center mb-4">
                    <img :src="backendUser.value.avatar" alt="Avatar" class="w-24 h-24 rounded-full object-cover" />
                </div> -->
                <nav class="flex flex-col space-y-1 space-x-0">
                    <Button
                        v-for="item in sidebarNavItems"
                        :key="item.href"
                        variant="ghost"
                        :class="['w-full justify-start', { 'bg-muted': currentPath === item.href }]"
                        as-child
                    >
                        <Link :href="item.href">
                            {{ item.title }}
                        </Link>
                    </Button>
                </nav>
            </aside>

            <Separator class="my-6 md:hidden" />

            <div class="flex-1 md:max-w-2xl">
                <section class="max-w-xl space-y-12">
                    <slot />
                </section>
            </div>
        </div>
    </div>
</template>
