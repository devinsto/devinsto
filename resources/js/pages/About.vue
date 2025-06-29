<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { Briefcase, HeartHandshake, Lightbulb, Rocket, Star, TrendingUp, Users } from 'lucide-vue-next';
import FooterSite from './FooterSite.vue';
</script>

<template>
  <div class="min-h-screen bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 flex flex-col">
    <NavBar />
    <main class="flex-1">
      <!-- Hero -->
      <section class="bg-gradient-to-r from-emerald-100 to-emerald-200 dark:from-emerald-900/20 dark:to-slate-800/20 border-b border-emerald-200 dark:border-emerald-500/20">
        <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8 text-center">
          <div class="flex justify-center mb-4 animate-fade-in-down">
            <div class="w-16 h-16 bg-emerald-700 dark:bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200/40 dark:shadow-emerald-900/40">
              <Rocket class="w-8 h-8 text-slate-100 dark:text-slate-900" />
            </div>
          </div>
          <h1 class="text-4xl sm:text-5xl font-bold mb-2 tracking-tight animate-fade-in-down">À Propos de Devinsto.com</h1>
          <p class="text-xl text-emerald-700 dark:text-emerald-400 font-semibold mb-2 animate-fade-in-down">Apprendre. Créer. Innover.</p>
          <p class="text-slate-700 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed animate-fade-in-down">
            Devinsto.com est une plateforme complète pour apprendre, créer et collaborer dans le développement, le design et la gestion de projets numériques. Notre mission : rendre l’éducation et la création accessibles à tous.
          </p>
        </div>
      </section>

      <!-- Mission -->
      <section class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 space-y-10">
        <div class="animate-fade-in-up">
          <h2 class="text-3xl font-bold mb-4 flex items-center gap-2">
            <Lightbulb class="w-7 h-7 text-emerald-700 dark:text-emerald-400" /> Notre Mission
          </h2>
          <p class="mb-4 text-lg text-slate-700 dark:text-slate-300">
            Démocratiser l'accès aux ressources éducatives et aux outils de création, pour que chacun puisse développer ses compétences et bâtir sa présence en ligne, quel que soit son niveau ou ses ambitions.
          </p>
          <div class="grid gap-6 sm:grid-cols-3">
            <div class="bg-white dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-center shadow-sm animate-fade-in-up delay-100">
              <Star class="w-8 h-8 text-emerald-700 dark:text-emerald-400 mb-2" />
              <h3 class="font-semibold text-lg mb-1">Apprendre sans limite</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm text-center">
                Formations en programmation web, design graphique, développement mobile, et plus encore.
              </p>
            </div>
            <div class="bg-white dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-center shadow-sm animate-fade-in-up delay-200">
              <Rocket class="w-8 h-8 text-emerald-700 dark:text-emerald-400 mb-2" />
              <h3 class="font-semibold text-lg mb-1">Créer des projets</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm text-center">
                Outils et ressources pour concrétiser vos idées, créer des sites web, déployer et maintenir vos projets.
              </p>
            </div>
            <div class="bg-white dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-center shadow-sm animate-fade-in-up delay-300">
              <Users class="w-8 h-8 text-emerald-700 dark:text-emerald-400 mb-2" />
              <h3 class="font-semibold text-lg mb-1">Collaborer & partager</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm text-center">
                Une communauté active pour échanger, s’entraider et progresser ensemble.
              </p>
            </div>
          </div>
        </div>

        <!-- Valeurs -->
        <div class="animate-fade-in-up">
          <h2 class="text-3xl font-bold mb-4 flex items-center gap-2">
            <HeartHandshake class="w-7 h-7 text-emerald-700 dark:text-emerald-400" /> Nos Valeurs
          </h2>
          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <Lightbulb class="w-6 h-6 text-emerald-700 dark:text-emerald-400 mt-1" />
              <div>
                <strong>Passion pour l’apprentissage :</strong>
                <span class="text-slate-700 dark:text-slate-300">Nous croyons que l'éducation change des vies. Notre contenu est accessible, de qualité, et toujours à la pointe.</span>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <Rocket class="w-6 h-6 text-emerald-700 dark:text-emerald-400 mt-1" />
              <div>
                <strong>Créativité & innovation :</strong>
                <span class="text-slate-700 dark:text-slate-300">Nous encourageons la pensée créative et offrons des outils pour repousser les limites et réaliser des projets uniques.</span>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <Users class="w-6 h-6 text-emerald-700 dark:text-emerald-400 mt-1" />
              <div>
                <strong>Accessibilité & inclusivité :</strong>
                <span class="text-slate-700 dark:text-slate-300">Notre plateforme est ouverte à tous, quels que soient l’âge, l’expérience ou les moyens financiers.</span>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <HeartHandshake class="w-6 h-6 text-emerald-700 dark:text-emerald-400 mt-1" />
              <div>
                <strong>Collaboration & soutien :</strong>
                <span class="text-slate-700 dark:text-slate-300">Nous valorisons l’entraide et la communauté. Chacun peut apprendre, partager et s’entraider.</span>
              </div>
            </li>
          </ul>
        </div>

        <!-- Équipe -->
        <div class="animate-fade-in-up">
          <h2 class="text-3xl font-bold mb-4 flex items-center gap-2">
            <Users class="w-7 h-7 text-emerald-700 dark:text-emerald-400" /> Notre Équipe
          </h2>
          <p class="mb-4 text-lg text-slate-700 dark:text-slate-300">
            Une équipe passionnée d’innovateurs, de développeurs, de designers et de formateurs, unie par la volonté de vous accompagner dans votre progression et la réussite de vos projets numériques.
          </p>
        </div>

        <!-- Carrières -->
        <div class="animate-fade-in-up">
          <h2 class="text-3xl font-bold mb-4 flex items-center gap-2">
            <Briefcase class="w-7 h-7 text-emerald-700 dark:text-emerald-400" /> Carrières chez Devinsto.com
          </h2>
          <p class="mb-4 text-lg text-slate-700 dark:text-slate-300">
            Nous recrutons des talents passionnés par le développement, le design, le marketing ou l’éducation. Rejoignez une équipe innovante qui valorise la créativité, l’apprentissage et l’impact.
          </p>
          <div class="grid gap-6 sm:grid-cols-3">
            <div class="bg-white dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-center shadow-sm animate-fade-in-up delay-100">
              <TrendingUp class="w-8 h-8 text-emerald-700 dark:text-emerald-400 mb-2" />
              <h3 class="font-semibold text-lg mb-1">Impact</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm text-center">
                Participez à la transformation de l’apprentissage et de la création numérique.
              </p>
            </div>
            <div class="bg-white dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-center shadow-sm animate-fade-in-up delay-200">
              <Users class="w-8 h-8 text-emerald-700 dark:text-emerald-400 mb-2" />
              <h3 class="font-semibold text-lg mb-1">Travail collaboratif</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm text-center">
                Évoluez dans une équipe soudée, partagez vos idées et grandissez ensemble.
              </p>
            </div>
            <div class="bg-white dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-center shadow-sm animate-fade-in-up delay-300">
              <Star class="w-8 h-8 text-emerald-700 dark:text-emerald-400 mb-2" />
              <h3 class="font-semibold text-lg mb-1">Opportunités de croissance</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm text-center">
                Développez vos compétences et évoluez avec la plateforme au fil de sa croissance.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <FooterSite />
  </div>
</template>

<style scoped>
@keyframes fade-in-down {
  from { opacity: 0; transform: translateY(-30px);}
  to { opacity: 1; transform: translateY(0);}
}
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(30px);}
  to { opacity: 1; transform: translateY(0);}
}
.animate-fade-in-down {
  animation: fade-in-down 0.7s cubic-bezier(.4,0,.2,1);
}
.animate-fade-in-up {
  animation: fade-in-up 0.7s cubic-bezier(.4,0,.2,1);
}
.animate-fade-in-up.delay-100 { animation-delay: .1s; }
.animate-fade-in-up.delay-200 { animation-delay: .2s; }
.animate-fade-in-up.delay-300 { animation-delay: .3s; }
</style>
