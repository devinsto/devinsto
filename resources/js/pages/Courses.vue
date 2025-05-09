<script setup lang="ts">
import NavBar from '@/components/NavBar.vue'
</script>

<template>
  <NavBar />
  <div class="courses-container p-6">
    <h1 class="text-4xl font-bold mb-4">Nos Cours</h1>
    <p class="mb-4">
      Découvrez notre sélection de cours conçus pour vous aider à acquérir de nouvelles compétences et à progresser dans votre carrière.
    </p>
    <div class="course-list">
      <div class="course-item mb-4">
        <h2 class="text-2xl font-semibold">Développement Web</h2>
        <p>Apprenez à créer des sites web modernes avec HTML, CSS et JavaScript.</p>
        <a href="/courses/web-development" class="text-blue-500">En savoir plus</a>
      </div>
      <div class="course-item mb-4">
        <h2 class="text-2xl font-semibold">Data Science</h2>
        <p>Maîtrisez l'analyse de données, le machine learning et la visualisation de données.</p>
        <a href="/courses/data-science" class="text-blue-500">En savoir plus</a>
      </div>
      <div class="course-item mb-4">
        <h2 class="text-2xl font-semibold">Marketing Digital</h2>
        <p>Apprenez à promouvoir des produits et services en ligne efficacement.</p>
        <a href="/courses/digital-marketing" class="text-blue-500">En savoir plus</a>
      </div>
    </div>
  </div>
</template>

<style scoped>
.courses-container {
  background-color: #f9f9f9;
  border-radius: 8px;
}
</style>
