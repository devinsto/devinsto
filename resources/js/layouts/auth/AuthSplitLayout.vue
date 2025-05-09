<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const name = page.props.name;
const quote = page.props.quote;

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div class="relative hidden h-full flex-col bg-muted p-10 text-white dark:border-r lg:flex">
            <div class="absolute inset-0 bg-red-900" id="left-s"/>
            <Link :href="route('home')" class="relative z-20 flex items-center text-lg font-medium">
            
            {{ name }}
            </Link>
            <div v-if="quote" class="relative z-20 mt-auto">
                <blockquote class="space-y-2">
                    <p class="text-lg">&ldquo;{{ quote.message }}&rdquo;</p>
                    <footer class="text-sm text-neutral-300">{{ quote.author }}</footer>
                </blockquote>
            </div>
        </div>
        <div class="lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                <div class="mb-4 ml-30 flex h-9 w-9 items-center justify-center rounded-md">
                        <AppLogoIcon class="size-9 fill-current text-[var(--foreground)] dark:text-white" />
                    </div>
                <div class="flex flex-col space-y-2 text-center">
                    <h1 class="text-xl font-medium tracking-tight" v-if="title">{{ title }}</h1>
                    <p class="text-sm text-muted-foreground" v-if="description">{{ description }}</p>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>

<style scoped>
/* public/storage/signUpStepBg.dece5035.webp */
    #left-s{
        background-image: url('http://localhost:8000/storage/signUpStepBg.dece5035.webp');
        background-size: cover; /* Couvre l'élément */
        background-position: center; /* Centre l'image */
        background-color: rgba(1, 28, 0, 0.5); /* Couleur de superposition noire avec 50% d'opacité */
    background-blend-mode: overlay; /* Mode de fusion pour mélanger l'image et la couleur */

    }
    .dim{
    padding-top: 70%;
    transform: scale(3.7);
}
#img{
    padding-top: 100%;
    position: relative;
    width: 80px;
    height: 80px;
}

</style>
