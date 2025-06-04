<script setup lang="ts">
import FooterSite from './FooterSite.vue'
import NavBar from '@/components/NavBar.vue'
import { ArrowRight, Code, Eye, Globe, Infinity, Layers, PenTool, Sparkles } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'

const showSections = ref([false, false, false, false, false])

// Animation au scroll (simple, sans IntersectionObserver pour compatibilité SSR)
onMounted(() => {
  let timeout = 0
  showSections.value.forEach((_, idx) => {
    setTimeout(() => showSections.value[idx] = true, timeout)
    timeout += 350
  })
})
</script>

<template>
  <div class="min-h-screen bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 flex flex-col">
    <NavBar />
    <main class="flex-1">
      <!-- Hero -->
      <section class="bg-gradient-to-r from-emerald-100 to-emerald-200 dark:from-emerald-900/20 dark:to-slate-800/20 border-b border-emerald-200 dark:border-emerald-500/20">
        <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8 text-center">
          <transition name="fade-slide">
            <div v-if="showSections[0]" class="flex flex-col items-center gap-4">
              <div class="w-20 h-20 rounded-full bg-emerald-700 dark:bg-emerald-500 flex items-center justify-center shadow-lg shadow-emerald-200/40 dark:shadow-emerald-900/40 animate-bounce-slow">
                <Sparkles class="w-10 h-10 text-white dark:text-slate-900" />
              </div>
              <h1 class="text-4xl sm:text-5xl font-bold tracking-tight">Concept du Logo Devinsto</h1>
              <p class="text-xl text-emerald-700 dark:text-emerald-400 font-semibold">
                Développement, Création, Visibilité &amp; Innovation
              </p>
              <p class="max-w-2xl mx-auto text-slate-700 dark:text-slate-300 leading-relaxed">
                Devinsto est une plateforme tout-en-un qui combine développement, graphisme, création et visibilité en ligne, pour transformer des idées en projets concrets, avec une vision d’innovation et d’accessibilité.
              </p>
            </div>
          </transition>
        </div>
      </section>

      <!-- Section Dev -->
      <section class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <transition name="fade-slide">
          <div v-if="showSections[1]" class="grid gap-8 sm:grid-cols-2 items-center animate-fade-in-up">
            <div class="flex flex-col items-center sm:items-start">
              <div class="w-16 h-16 rounded-xl bg-emerald-700 dark:bg-emerald-500 flex items-center justify-center mb-4 shadow-md">
                <Code class="w-9 h-9 text-white dark:text-slate-900" />
              </div>
              <h2 class="text-2xl font-bold mb-2 text-emerald-700 dark:text-emerald-400">"Dev" : L’âme technique</h2>
              <p class="text-slate-700 dark:text-slate-300">
                Le <strong>Dev</strong> dans Devinsto représente Eva, la fille du créateur, et évoque le rôle de développeur. Il symbolise l’aspect technique de la plateforme, offrant des ressources et des outils pour la programmation web et mobile (<span class="font-semibold">PHP, JavaScript, C#, Flutter, Vue.js</span>, etc.). C’est aussi un espace d’innovation pour les professionnels du développement qui souhaitent créer des solutions numériques performantes.
              </p>
            </div>
            <div class="flex justify-center sm:justify-end">
              <transition name="pop">
                <div v-if="showSections[1]" class="relative">
                  <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center z-0 animate-pulse-fast">
                    <Infinity class="w-7 h-7 text-emerald-700 dark:text-emerald-400" />
                  </div>
                  <img src="https://cdn-icons-png.flaticon.com/512/2721/2721296.png" alt="Développement" class="w-32 h-32 object-contain rounded-xl shadow-lg z-10" />
                </div>
              </transition>
            </div>
          </div>
        </transition>
      </section>

      <!-- Section Insto -->
      <section class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <transition name="fade-slide">
          <div v-if="showSections[2]" class="grid gap-8 sm:grid-cols-2 items-center animate-fade-in-up">
            <div class="order-2 sm:order-1 flex flex-col items-center sm:items-start">
              <div class="w-16 h-16 rounded-xl bg-emerald-700 dark:bg-emerald-500 flex items-center justify-center mb-4 shadow-md">
                <Infinity class="w-9 h-9 text-white dark:text-slate-900" />
              </div>
              <h2 class="text-2xl font-bold mb-2 text-emerald-700 dark:text-emerald-400">"Insto" : Création &amp; Infini</h2>
              <p class="text-slate-700 dark:text-slate-300">
                Le <strong>Insto</strong> fait référence à l’infini des possibilités, où chaque utilisateur peut créer, apprendre, et se développer sans limites. C’est aussi un clin d’œil au prénom Rostand, ajoutant une touche personnelle. Insto incarne la création visuelle accessible, offrant des outils puissants pour concevoir des visuels attractifs, supports de communication, et booster la visibilité en ligne.
              </p>
            </div>
            <div class="order-1 sm:order-2 flex justify-center sm:justify-start">
              <transition name="pop">
                <div v-if="showSections[2]" class="relative">
                  <div class="absolute -top-4 -right-4 w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center z-0 animate-pulse-fast">
                    <PenTool class="w-7 h-7 text-emerald-700 dark:text-emerald-400" />
                  </div>
                  <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Création graphique" class="w-32 h-32 object-contain rounded-xl shadow-lg z-10" />
                </div>
              </transition>
            </div>
          </div>
        </transition>
      </section>

      <!-- Section Graphisme & Visibilité -->
      <section class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <transition name="fade-slide">
          <div v-if="showSections[3]" class="grid gap-8 sm:grid-cols-2 items-center animate-fade-in-up">
            <div class="flex flex-col items-center sm:items-start">
              <div class="w-16 h-16 rounded-xl bg-emerald-700 dark:bg-emerald-500 flex items-center justify-center mb-4 shadow-md">
                <Eye class="w-9 h-9 text-white dark:text-slate-900" />
              </div>
              <h2 class="text-2xl font-bold mb-2 text-emerald-700 dark:text-emerald-400">Graphisme &amp; Visibilité en ligne</h2>
              <p class="text-slate-700 dark:text-slate-300">
                Nous offrons une expertise en graphisme numérique avec des outils comme <span class="font-semibold">Illustrator, Photoshop, InDesign, XD</span>. Créez des logos, bannières, maquettes, et optimisez la présence en ligne de votre entreprise grâce à des designs percutants et un branding cohérent.
              </p>
            </div>
            <div class="flex justify-center sm:justify-end">
              <transition name="pop">
                <div v-if="showSections[3]" class="relative">
                  <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center z-0 animate-pulse-fast">
                    <Globe class="w-7 h-7 text-emerald-700 dark:text-emerald-400" />
                  </div>
                  <img src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" alt="Visibilité en ligne" class="w-32 h-32 object-contain rounded-xl shadow-lg z-10" />
                </div>
              </transition>
            </div>
          </div>
        </transition>
      </section>

      <!-- Résumé -->
      <section class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <transition name="fade-slide">
          <div v-if="showSections[4]" class="rounded-xl bg-white dark:bg-slate-900/60 border border-slate-200 dark:border-slate-800 p-8 shadow-lg text-center animate-fade-in-up">
            <h2 class="text-2xl font-bold mb-4 text-emerald-700 dark:text-emerald-400 flex items-center justify-center gap-2">
              <Layers class="w-7 h-7" /> En résumé
            </h2>
            <p class="text-lg text-slate-700 dark:text-slate-300 mb-4">
              Devinsto est une plateforme polyvalente et accessible, qui allie développement, graphisme, et création de visibilité en ligne. Que ce soit pour le développement de sites web, la création de visuels impactants, ou l’optimisation de la présence digitale, Devinsto offre tous les outils pour transformer des idées en projets réussis.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
              <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 dark:bg-emerald-900 text-emerald-700 dark:text-emerald-400 font-semibold">
                <ArrowRight class="w-5 h-5" /> Créez, apprenez, innovez, développez-vous !
              </span>
            </div>
          </div>
        </transition>
      </section>
    </main>
    <FooterSite />
  </div>
</template>

<style scoped>
@keyframes fade-slide-in {
  from { opacity: 0; transform: translateY(40px);}
  to { opacity: 1; transform: translateY(0);}
}
.fade-slide-enter-active {
  animation: fade-slide-in 0.7s cubic-bezier(.4,0,.2,1);
}
.fade-slide-leave-active {
  animation: fade-slide-in 0.7s cubic-bezier(.4,0,.2,1) reverse;
}
@keyframes fade-in-up {
  from { opacity: 0; transform: translateY(30px);}
  to { opacity: 1; transform: translateY(0);}
}
.animate-fade-in-up {
  animation: fade-in-up 0.7s cubic-bezier(.4,0,.2,1);
}
@keyframes bounce-slow {
  0%, 100% { transform: translateY(0);}
  50% { transform: translateY(-12px);}
}
.animate-bounce-slow {
  animation: bounce-slow 2s infinite;
}
@keyframes pop-in {
  from { opacity: 0; transform: scale(0.8);}
  to { opacity: 1; transform: scale(1);}
}
.pop-enter-active {
  animation: pop-in 0.5s cubic-bezier(.4,0,.2,1);
}
.pop-leave-active {
  animation: pop-in 0.5s cubic-bezier(.4,0,.2,1) reverse;
}
.animate-pulse-fast {
  animation: pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 1;}
  50% { transform: scale(0.95); opacity: 0.8;}
}
</style>
