<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { Home, LayoutGrid } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },

    {
        title: 'Home',
        href: '/',
        icon: Home,
    },
];

const footerNavItems: NavItem[] = [
     {
        title: 'Github Repo',
       href: '#',
       icon: Home,
    },
   {
       title: 'Documentation',
       href: '#',
      icon: Home,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset" class="text-primary bg-[#58d1af]">
        <SidebarHeader class="bg-[#020618]">
            <SidebarMenu >
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child >
                        <Link :href="route('dashboard')" prefetch>
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent class="bg-[#020618] ">
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter class="bg-[#020618] ">
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
