<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { computed, ref } from 'vue';
import FooterSite from './FooterSite.vue';

interface Article {
    id: number;
    title: string;
    excerpt: string;
    content: string;
    date: string;
    author: string;
    category?: string;
    image?: string;
}

const articles = ref<Article[]>([
    {
        id: 1,
        title: 'Actualités du Développement Web : Tendances, Design et Optimisation',
        excerpt: "Lorem Ipsum is simply dummy text of the printing and typesetting industry, Lorem Ipsum has been the industry's...",
        content:
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
        date: '10 Jan, 2025',
        author: 'Devinsto',
        category: 'Développement',
        image: 'http://localhost:8000/storage/signUpStepBg.dece5035.webp',
    },
    {
        id: 2,
        title: 'Les nouvelles tendances en UI/UX pour 2025',
        excerpt: 'Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
        content:
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
        date: '10 Jan, 2025',
        author: 'Devinsto',
        image: 'http://localhost:8000/storage/c.jpeg',
    },
    {
        id: 3,
        title: "L'impact de l'IA sur le développement frontend",
        excerpt:
            "llllllllllllllllllllllllllllllllllllllllLorem Ipsum is simply dummy text of the printing and typesetting industry, Lorem Ipsum has been the industry's...",
        content:
            "Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
        date: '10 Jan, 2025',
        author: 'Devinsto',
        category: 'ARTIFICIAL',
        image: 'http://localhost:8000/storage/b.jpg',
    },
    {
        id: 4,
        title: 'Optimisation des performances web : les bonnes pratiques',
        excerpt: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...",
        content:
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
        date: '10 Jan, 2025',
        author: 'Devinsto',
        image: 'http://localhost:8000/storage/a.webp',
    },
]);

const visibleArticles = computed(() => articles.value.slice(0, 4));
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <NavBar />

        <main class="px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <!-- Section Header -->
                <div class="mb-12 text-center">
                    <h2 class="mb-4 text-3xl font-bold text-gray-900">Actualités du Développement Web</h2>
                    <p class="mx-auto max-w-3xl text-lg text-gray-600">
                        Restez informé des dernières tendances, designs et techniques d'optimisation
                    </p>
                </div>

                <!-- Articles Grid -->
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <article
                        v-for="article in visibleArticles"
                        :key="article.id"
                        class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg"
                    >
                        <!-- Image Container -->
                        <div class="relative h-48 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-cover bg-center transition-transform duration-500 hover:scale-105"
                                :style="{ backgroundImage: `url(${article.image})` }"
                            ></div>
                            <div
                                v-if="!article.image"
                                class="flex h-full w-full items-center justify-center bg-gradient-to-r from-blue-50 to-purple-50"
                            >
                                <svg class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="p-6">
                            <!-- Category Badge -->
                            <div v-if="article.category" class="mb-3">
                                <span
                                    class="inline-block rounded-full px-3 py-1 text-xs font-semibold"
                                    :class="{
                                        'bg-blue-100 text-blue-800': article.category === 'Développement',
                                        'bg-purple-100 text-purple-800': article.category === 'ARTIFICIAL',
                                        'bg-green-100 text-green-800': !['Développement', 'ARTIFICIAL'].includes(article.category),
                                    }"
                                >
                                    {{ article.category }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="mb-2 line-clamp-2 text-xl font-semibold text-gray-800">
                                {{ article.title }}
                            </h3>

                            <!-- Excerpt -->
                            <p class="mb-4 line-clamp-3 text-gray-600">
                                {{ article.excerpt }}
                            </p>

                            <!-- Meta -->
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>{{ article.date }}</span>
                                <span class="font-medium">{{ article.author }}</span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- View All Button -->
                <div class="mt-12 text-center">
                    <button
                        class="inline-flex cursor-pointer items-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm transition-colors duration-200 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
                    >
                        Voir tous les articles
                        <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
        </main>
<FooterSite/>

    </div>
</template>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
 
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;

}
</style>
