<script setup lang="ts">
import AppLayoutAdmin from '@/layouts/app/AppSidebarLayoutAdmin.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayoutAdmin :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayoutAdmin>
</template>
