<!-- filepath: /home/devinsto/sites/devinsto/resources/js/pages/FaqConfig.vue -->
<script setup lang="ts">
import FooterSite from './FooterSite.vue'
import NavBar from '@/components/NavBar.vue'
import { ChevronDown, HelpCircle } from 'lucide-vue-next'
import { ref } from 'vue'

const faqs = [
  {
    question: "Qu'est-ce que Devinsto.com ?",
    answer: `Devinsto.com est une plateforme polyvalente dédiée à l'apprentissage, à la création et à la collaboration dans les domaines du développement web et mobile, du design graphique, de la gestion de projets numériques, ainsi qu’à l’hébergement et au déploiement de sites. Nous proposons des cours, des outils de développement, des ressources graphiques, ainsi qu'une communauté active pour vous aider à créer des projets de qualité professionnelle.`
  },
  {
    question: "Qui peut utiliser Devinsto.com ?",
    answer: `Devinsto.com est ouvert à tous, qu’il s’agisse de débutants qui souhaitent apprendre à coder ou de professionnels qui cherchent à se perfectionner. Nous avons conçu notre plateforme pour qu’elle soit accessible à toutes les personnes intéressées par le développement web, mobile, le graphisme, ou l'entrepreneuriat numérique. Que vous soyez étudiant, développeur, designer ou entrepreneur, vous trouverez des ressources adaptées à vos besoins.`
  },
  {
    question: "Quels types de cours sont disponibles sur Devinsto.com ?",
    answer: `<ul class="list-disc ml-6 space-y-1">
      <li>Développement web : PHP, JavaScript, Vue.js, TailwindCSS, Laravel, C#, etc.</li>
      <li>Développement mobile : Dart, Flutter.</li>
      <li>Design graphique : Illustrator, Photoshop, InDesign, XD.</li>
      <li>Déploiement et hébergement : VPS, Coolify, etc.</li>
      <li>Création de sites WordPress et gestion de contenu.</li>
      <li>E-learning et gestion de projets numériques.</li>
    </ul>
    <p class="mt-2">Nos cours sont conçus pour vous permettre d'acquérir des compétences pratiques à travers des projets réels et des exercices interactifs.</p>`
  },
  {
    question: "Comment puis-je accéder aux cours de Devinsto.com ?",
    answer: `Une fois inscrit sur Devinsto.com, vous aurez accès à tous nos cours en ligne directement depuis votre tableau de bord. Les cours sont organisés par catégories (développement, graphisme, etc.) et peuvent être suivis à votre rythme. Si vous optez pour un abonnement premium, vous pourrez également bénéficier de ressources supplémentaires comme des sessions en direct, des ateliers de création, et plus encore.`
  },
  {
    question: "Quelles sont les options d’abonnement sur Devinsto.com ?",
    answer: `<ul class="list-disc ml-6 space-y-1">
      <li><strong>Abonnement gratuit :</strong> Accès limité à une sélection de cours, tutoriels et ressources.</li>
      <li><strong>Abonnement premium :</strong> Accès complet à tous les cours, ressources supplémentaires, projets pratiques, et à notre communauté privée.</li>
    </ul>
    <p class="mt-2">Les utilisateurs Premium bénéficient également d'un accès prioritaire à des ateliers en direct, des consultations individuelles et des réductions pour des événements ou des formations.</p>`
  },
  {
    question: "Est-ce que Devinsto.com propose des certifications à la fin des cours ?",
    answer: `Oui, chaque cours complet sur Devinsto.com offre une certification de réussite que vous pouvez télécharger et partager. Ces certificats attestent de vos compétences dans les domaines que vous avez étudiés et peuvent être un atout précieux pour votre carrière professionnelle.`
  },
  {
    question: "Est-ce que Devinsto.com dispose d’une communauté d’utilisateurs ?",
    answer: `Oui ! Devinsto.com offre une plateforme de communauté où vous pouvez échanger avec d'autres apprenants, poser des questions, partager vos projets et collaborer sur des idées. Vous aurez également accès à un forum pour discuter de sujets techniques et créatifs, partager des conseils, et recevoir des retours sur vos créations.`
  },
  {
    question: "Comment puis-je obtenir du support si je rencontre un problème ?",
    answer: `Si vous avez des questions ou rencontrez des problèmes techniques, vous pouvez contacter notre équipe d’assistance via notre page de support. Nous répondons rapidement à toutes les demandes pour garantir une expérience fluide et agréable. Vous pouvez également consulter notre centre d’aide en ligne pour des réponses aux questions les plus courantes.`
  },
  {
    question: "Puis-je annuler mon abonnement à tout moment ?",
    answer: `Oui, vous pouvez annuler votre abonnement à tout moment via votre tableau de bord utilisateur. Si vous êtes abonné au plan premium, vous continuerez à bénéficier de votre abonnement jusqu'à la fin de la période de facturation en cours. Les abonnements annuels peuvent également être résiliés avec un préavis de 30 jours.`
  },
  {
    question: "Est-ce que Devinsto.com est accessible depuis mobile ?",
    answer: `Oui, Devinsto.com est entièrement responsive et peut être utilisé depuis un smartphone ou une tablette. Vous pouvez accéder à tous nos cours, outils, et ressources directement via un navigateur mobile, ce qui vous permet d'apprendre et de créer où que vous soyez.`
  },
  {
    question: "Quels sont les modes de paiement acceptés ?",
    answer: `Nous acceptons les paiements par carte bancaire (Visa, MasterCard, American Express) ainsi que des solutions de paiement en ligne comme PayPal. Les utilisateurs peuvent payer pour leur abonnement sur une base mensuelle ou annuelle, selon la formule choisie.`
  },
  {
    question: "Devinsto.com propose-t-il des offres ou promotions spéciales ?",
    answer: `Oui, nous organisons régulièrement des promotions et des offres spéciales, en particulier pour les nouveaux utilisateurs ou lors d’événements spéciaux. Inscrivez-vous à notre newsletter pour être informé des dernières offres et des nouveautés sur notre plateforme.`
  },
  {
    question: "Devinsto.com propose-t-il des outils de création de sites web ?",
    answer: `Oui, nous proposons des outils pour créer des sites web avec WordPress, gérer leur maintenance, et déployer des applications via des services comme VPS et Coolify. Nos ressources sont adaptées aussi bien aux débutants qu'aux professionnels cherchant à optimiser leur présence en ligne.`
  }
]

const openIndex = ref<number | null>(null)
const toggle = (idx: number) => {
  openIndex.value = openIndex.value === idx ? null : idx
}
</script>

<template>
  <div class="min-h-screen bg-white text-slate-900 dark:bg-slate-950 dark:text-slate-100 flex flex-col">
    <NavBar />
    <main class="flex-1">
      <div class="bg-gradient-to-r from-emerald-100 to-emerald-200 dark:from-emerald-900/20 dark:to-slate-800/20 border-b border-emerald-200 dark:border-emerald-500/20">
        <div class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8 text-center">
          <div class="flex justify-center mb-4 animate-fade-in-down">
            <div class="w-16 h-16 bg-emerald-700 dark:bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200/40 dark:shadow-emerald-900/40">
              <HelpCircle class="w-8 h-8 text-slate-100 dark:text-slate-900" />
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl font-bold mb-2">FAQ - Questions Fréquemment Posées</h1>
          <p class="text-xl text-emerald-700 dark:text-emerald-400 font-semibold mb-2">Devinsto.com</p>
          <p class="text-slate-700 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
            Voici les réponses aux questions les plus fréquentes concernant Devinsto.com.<br>
            Si vous avez d’autres interrogations, <a href="/support-config" class="underline text-emerald-700 dark:text-emerald-400 hover:text-emerald-900 dark:hover:text-emerald-300 transition">contactez-nous</a> !
          </p>
        </div>
      </div>

      <div class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="space-y-4">
          <TransitionGroup name="faq-fade" tag="div">
            <div
              v-for="(faq, idx) in faqs"
              :key="faq.question"
              class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/60 shadow-sm transition-all duration-300"
            >
              <button
                class="w-full flex items-center justify-between px-6 py-5 text-left focus:outline-none group"
                @click="toggle(idx)"
                :aria-expanded="openIndex === idx"
              >
                <span class="flex items-center gap-3 text-lg font-semibold text-slate-900 dark:text-slate-100 transition-colors">
                  <span class="inline-block w-7 h-7 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mr-2">
                    <HelpCircle class="w-5 h-5 text-emerald-700 dark:text-emerald-400" />
                  </span>
                  {{ idx + 1 }}. {{ faq.question }}
                </span>
                <span class="transition-transform duration-300"
                  :class="openIndex === idx ? 'rotate-180 text-emerald-700 dark:text-emerald-400' : 'text-slate-400 dark:text-slate-500'">
                  <ChevronDown class="w-6 h-6" />
                </span>
              </button>
              <transition name="accordion">
                <div
                  v-if="openIndex === idx"
                  class="px-6 pb-6 pt-1 text-slate-700 dark:text-slate-300 text-base animate-fade-in"
                >
                  <div v-if="faq.answer.startsWith('<ul')" v-html="faq.answer"></div>
                  <div v-else v-html="faq.answer"></div>
                </div>
              </transition>
            </div>
          </TransitionGroup>
        </div>
      </div>
    </main>
    <FooterSite />
  </div>
</template>

<style scoped>
/* Animation d'apparition pour l'icône */
@keyframes fade-in-down {
  from { opacity: 0; transform: translateY(-30px);}
  to { opacity: 1; transform: translateY(0);}
}
.animate-fade-in-down {
  animation: fade-in-down 0.7s cubic-bezier(.4,0,.2,1);
}

/* Animation d'accordéon */
.accordion-enter-active, .accordion-leave-active {
  transition: max-height 0.4s cubic-bezier(.4,0,.2,1), opacity 0.3s;
  overflow: hidden;
}
.accordion-enter-from, .accordion-leave-to {
  max-height: 0;
  opacity: 0;
}
.accordion-enter-to, .accordion-leave-from {
  max-height: 500px;
  opacity: 1;
}

/* Animation de fade sur le groupe */
.faq-fade-move, .faq-fade-enter-active, .faq-fade-leave-active {
  transition: all 0.3s cubic-bezier(.4,0,.2,1);
}
.faq-fade-enter-from, .faq-fade-leave-to {
  opacity: 0;
  transform: translateY(10px);
}
.faq-fade-enter-to, .faq-fade-leave-from {
  opacity: 1;
  transform: translateY(0);
}
</style>
