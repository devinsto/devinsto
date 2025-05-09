<script setup lang="ts">
import { ref } from 'vue';
import NavBar from '@/components/NavBar.vue'; // Import ajouté
// Types
type TabType = 'formation' | 'graphisme' | 'maintenance' | 'montage';

// State
const activeTab = ref<TabType>('formation');

// Data
const tabs = [
  { id: 'formation', label: 'Formation' },
  { id: 'graphisme', label: 'Graphisme' },
  { id: 'maintenance', label: 'Maintenance' },
  { id: 'montage', label: 'Montage et trucage' }
];

const formations = [
  {
    title: "Les bases sur Vue.js",
    description: "Vue.js est un framework JavaScript progressif utilisé pour construire des interfaces utilisateur et des applications web.",
    logo: "https://cdn.worldvectorlogo.com/logos/vue-9.svg",
    category: "formation"
  },
  {
    title: "PHP pour débutants",
    description: "Apprenez les fondamentaux du PHP pour développer des applications web dynamiques.",
    logo: "https://cdn.worldvectorlogo.com/logos/php-1.svg",
    category: "formation"
  },
  {
    title: "Tailwind CSS avancé",
    description: "Maîtrisez les utilitaires Tailwind pour créer des designs responsive rapidement.",
    logo: "https://cdn.worldvectorlogo.com/logos/tailwindcss.svg",
    category: "formation"
  }
];

const graphisme = [
  {
    title: "Adobe Photoshop",
    description: "Formation complète sur les outils essentiels de Photoshop pour le design graphique.",
    logo: "https://cdn.worldvectorlogo.com/logos/adobe-photoshop-2.svg",
    category: "graphisme"
  },
  {
    title: "Illustrator",
    description: "Créez des illustrations vectorielles et des logos avec Adobe Illustrator.",
    logo: "https://cdn.worldvectorlogo.com/logos/adobe-illustrator-cc-icon.svg",
    category: "graphisme"
  },
  {
    title: "Figma",
    description: "Concevez des interfaces utilisateur collaboratives avec Figma.",
    logo: "https://cdn.worldvectorlogo.com/logos/figma-1.svg",
    category: "graphisme"
  }
];

const maintenance = [
  {
    title: "Maintenance PC",
    description: "Diagnostiquez et réparez les problèmes matériels et logiciels sur PC.",
    logo: "https://cdn.worldvectorlogo.com/logos/windows-11.svg",
    category: "maintenance"
  }
];

const montage = [
  {
    title: "Premiere Pro",
    description: "Montage vidéo professionnel avec Adobe Premiere Pro.",
    logo: "https://cdn.worldvectorlogo.com/logos/adobe-premiere-pro-1.svg",
    category: "montage"
  }
];

// Computed
const filteredItems = () => {
  switch(activeTab.value) {
    case 'formation': return formations;
    case 'graphisme': return graphisme;
    case 'maintenance': return maintenance;
    case 'montage': return montage;
    default: return [];
  }
};
</script>

<template>
    <NavBar /> <!-- Composant NavBar ajouté -->
  <section class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Tout ce dont vous avez besoin, en un seul endroit.</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Découvrez nos ressources complètes pour développer vos compétences.
        </p>
      </div>

      <!-- Tabs Navigation -->
      <div class="flex overflow-x-auto pb-2 mb-8 scrollbar-hide">
        <div class="flex space-x-1 mx-auto">
          <button
            v-for="tab in tabs"
            :key="tab.id"
            @click="activeTab = tab.id as TabType"
            class="px-6 py-3 rounded-full text-sm font-medium transition-colors whitespace-nowrap"
            :class="{
              'bg-blue-600 text-white': activeTab === tab.id,
              'bg-white text-gray-700 hover:bg-gray-100': activeTab !== tab.id
            }"
          >
            {{ tab.label }}
          </button>
        </div>
      </div>

      <!-- Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Cards -->
        <div 
          v-for="(item, index) in filteredItems()" 
          :key="index"
          class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
        >
          <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center mb-4">
              <img 
                :src="item.logo" 
                :alt="item.title" 
                class="h-12 w-12 object-contain mr-4"
              >
              <h3 class="text-xl font-semibold text-gray-800">{{ item.title }}</h3>
            </div>
            
            <!-- Description -->
            <p class="text-gray-600 mb-4">
              {{ item.description }}
            </p>
            
            <!-- Badge -->
            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full"
              :class="{
                'bg-blue-100 text-blue-800': item.category === 'formation',
                'bg-purple-100 text-purple-800': item.category === 'graphisme',
                'bg-green-100 text-green-800': item.category === 'maintenance',
                'bg-red-100 text-red-800': item.category === 'montage'
              }"
            >
              {{ item.category.charAt(0).toUpperCase() + item.category.slice(1) }}
            </span>
          </div>
          
          <!-- Footer -->
          <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">Cours & Docs PDF</span>
              <button class="text-blue-600 hover:text-blue-800 font-medium">
                Voir plus →
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Empty State -->
      <div v-if="filteredItems().length === 0" class="text-center py-12">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun contenu disponible</h3>
        <p class="mt-1 text-gray-500">Nous n'avons pas encore de ressources pour cette catégorie.</p>
      </div>
    </div>
  </section>
</template>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.scrollbar-hide {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
