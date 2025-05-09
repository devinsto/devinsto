<script setup lang="ts">
import NavBar from '@/components/NavBar.vue'
</script>

<template>
  <NavBar />
  <div class="blog-container p-6">
    <h1 class="text-4xl font-bold mb-4">Notre Blog</h1>
    <p class="mb-4">
      Restez à jour avec nos derniers articles et conseils sur l'apprentissage et le développement personnel.
    </p>
    <div class="blog-posts">
      <div class="blog-post mb-4">
        <h2 class="text-2xl font-semibold">5 Astuces pour Apprendre Plus Rapidement</h2>
        <p>Découvrez des techniques éprouvées pour améliorer votre capacité d'apprentissage.</p>
        <a href="/blog/learning-tips" class="text-blue-500">Lire l'article</a>
      </div>
      <div class="blog-post mb-4">
        <h2 class="text-2xl font-semibold">L'Importance de la Formation Continue</h2>
        <p>Pourquoi il est crucial de continuer à apprendre tout au long de sa carrière.</p>
        <a href="/blog/continuous-learning" class="text-blue-500">Lire l'article</a>
      </div>
      <div class="blog-post mb-4">
        <h2 class="text-2xl font-semibold">Comment Choisir le Bon Cours</h2>
        <p>Conseils pour sélectionner le cours qui vous convient le mieux.</p>
        <a href="/blog/choosing-courses" class="text-blue-500">Lire l'article</a>
      </div>
    </div>
  </div>
</template>

<style scoped>
.blog-container {
  background-color: #f9f9f9;
  border-radius: 8px;
}
</style>
