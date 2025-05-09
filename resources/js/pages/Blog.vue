<script setup lang="ts">
import { ref, computed } from 'vue';
import NavBar from '@/components/NavBar.vue';

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
    title: "Actualités du Développement Web : Tendances, Design et Optimisation",
    excerpt: "Lorem Ipsum is simply dummy text of the printing and typesetting industry, Lorem Ipsum has been the industry's...",
    content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
    date: "10 Jan, 2025",
    author: "Devinsto",
    category: "Développement",
    image: 'http://localhost:8000/storage/signUpStepBg.dece5035.webp'
  },
  {
    id: 2,
    title: "Les nouvelles tendances en UI/UX pour 2025",
    excerpt: "Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum is simply dummy text of the printing and typesetting industry...",
    content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
    date: "10 Jan, 2025",
    author: "Devinsto",
    image: 'http://localhost:8000/storage/c.jpeg'
  },
  {
    id: 3,
    title: "L'impact de l'IA sur le développement frontend",
    excerpt: "llllllllllllllllllllllllllllllllllllllllLorem Ipsum is simply dummy text of the printing and typesetting industry, Lorem Ipsum has been the industry's...",
    content: "Lorem  Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
    date: "10 Jan, 2025",
    author: "Devinsto",
    category: "ARTIFICIAL",
    image: 'http://localhost:8000/storage/b.jpg'
  },
  {
    id: 4,
    title: "Optimisation des performances web : les bonnes pratiques",
    excerpt: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...",
    content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...",
    date: "10 Jan, 2025",
    author: "Devinsto",
    image: 'http://localhost:8000/storage/a.webp'
  }
]);

const visibleArticles = computed(() => articles.value.slice(0, 4));
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <NavBar />
    
    <main class="py-16 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Actualités du Développement Web</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Restez informé des dernières tendances, designs et techniques d'optimisation
          </p>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <article 
            v-for="article in visibleArticles" 
            :key="article.id"
            class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 border border-gray-100"
          >
            <!-- Image Container -->
            <div class="h-48 relative overflow-hidden">
              <div 
                class="absolute inset-0 bg-cover bg-center transition-transform duration-500 hover:scale-105"
                :style="{ backgroundImage: `url(${article.image})` }"
              ></div>
              <div 
                v-if="!article.image"
                class="h-full w-full bg-gradient-to-r from-blue-50 to-purple-50 flex items-center justify-center"
              >
                <svg class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
            </div>

            <!-- Article Content -->
            <div class="p-6">
              <!-- Category Badge -->
              <div v-if="article.category" class="mb-3">
                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full"
                  :class="{
                    'bg-blue-100 text-blue-800': article.category === 'Développement',
                    'bg-purple-100 text-purple-800': article.category === 'ARTIFICIAL',
                    'bg-green-100 text-green-800': !['Développement', 'ARTIFICIAL'].includes(article.category)
                  }"
                >
                  {{ article.category }}
                </span>
              </div>

              <!-- Title -->
              <h3 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">
                {{ article.title }}
              </h3>

              <!-- Excerpt -->
              <p class="text-gray-600 mb-4 line-clamp-3">
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
        <div class="text-center mt-12">
          <button class="inline-flex cursor-pointer items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            Voir tous les articles
            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
      </div>
    </main>
  </div>
</template>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
