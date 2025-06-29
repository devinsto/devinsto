<!-- filepath: /home/devinsto/sites/devinsto/resources/js/pages/SupportConfig.vue -->
<script setup lang="ts">
import NavBar from '@/components/NavBar.vue'
import { Head } from '@inertiajs/vue3'
import { AlertTriangle, BookOpen, CheckCircle, Clock, CreditCard, Download, Laptop2, LifeBuoy, LogIn, Mail, MessageCircle, Users } from 'lucide-vue-next'
import { computed, onMounted, watch } from 'vue'
import FooterSite from './FooterSite.vue'

const contactOptions = [
  {
    icon: BookOpen,
    title: "Centre d'Aide en ligne",
    desc: "Consultez notre base de connaissances, guides et tutoriels pour des solutions rapides à vos problèmes techniques."
  },
  {
    icon: Mail,
    title: "Support par Email",
    desc: "Envoyez-nous un email à support@devinsto.com. Réponse sous 24h."
  },
  {
    icon: MessageCircle,
    title: "Chat en direct",
    desc: "Discutez en temps réel avec notre équipe technique pour une assistance immédiate."
  },
  {
    icon: Users,
    title: "Forum communautaire",
    desc: "Posez vos questions, échangez des astuces et obtenez des réponses de la communauté Devinsto."
  }
]

const problemTypes = [
  { icon: LogIn, label: "Problèmes d'accès à votre compte" },
  { icon: AlertTriangle, label: "Problèmes liés à l'interface utilisateur" },
  { icon: Laptop2, label: "Problèmes techniques lors de la création ou du suivi de projets" },
  { icon: CreditCard, label: "Problèmes liés au paiement et à l'abonnement" },
  { icon: Download, label: "Problèmes de téléchargement et d'accès aux ressources" }
]

const selfHelp = [
  { icon: BookOpen, label: "FAQ détaillée" },
  { icon: LifeBuoy, label: "Documentation produit et tutoriels" },
  { icon: Users, label: "Forum communautaire" }
]

const currentDate = new Date().toLocaleDateString('fr-FR')

// JSON-LD pour le SEO (ContactPage)
const supportJsonLd = computed(() =>
  JSON.stringify({
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Support Technique Devinsto.com",
    "description": "Contactez le support technique Devinsto.com par email, chat en direct ou via notre centre d'aide.",
    "url": "https://devinsto.com/support-config",
    "contactOption": [
      {
        "@type": "ContactPoint",
        "contactType": "customer support",
        "email": "support@devinsto.com",
        "availableLanguage": ["French", "English"]
      }
    ]
  })
)

// Injection dynamique du JSON-LD dans le <head>
const injectJsonLd = () => {
  let script = document.getElementById('support-jsonld') as HTMLScriptElement | null
  if (script) script.remove()
  script = document.createElement('script') as HTMLScriptElement
  script.type = 'application/ld+json'
  script.id = 'support-jsonld'
  script.text = supportJsonLd.value
  document.head.appendChild(script)
}

onMounted(() => {
  injectJsonLd()
})
watch(supportJsonLd, injectJsonLd)
</script>

<template>
  <div class="min-h-screen bg-white text-slate-900 dark:bg-slate-950 dark:text-slate-100 flex flex-col">
    <Head>
      <title>Support Technique | Devinsto.com</title>
      <meta name="description" content="Besoin d'aide ? Contactez le support technique Devinsto.com : chat en direct, email, centre d'aide, forum, FAQ et ressources pour résoudre tous vos problèmes." />
      <meta property="og:title" content="Support Technique | Devinsto.com" />
      <meta property="og:description" content="Contactez le support technique Devinsto.com : chat, email, centre d'aide, forum, FAQ et ressources pour résoudre tous vos problèmes." />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="https://devinsto.com/support-config" />
      <meta property="og:site_name" content="Devinsto.com" />
      <meta name="robots" content="index, follow" />
    </Head>
    <NavBar />
    <main class="flex-1">
      <div class="bg-gradient-to-r from-emerald-100 to-emerald-200 dark:from-emerald-900/20 dark:to-slate-800/20 border-b border-emerald-200 dark:border-emerald-500/20">
        <div class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8 text-center">
          <div class="flex justify-center mb-4">
            <div class="w-16 h-16 bg-emerald-700 dark:bg-emerald-500 rounded-xl flex items-center justify-center">
              <LifeBuoy class="w-8 h-8 text-slate-100 dark:text-slate-900" />
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl font-bold mb-2">Support Technique</h1>
          <p class="text-xl text-emerald-700 dark:text-emerald-400 font-semibold mb-2">Devinsto.com</p>
          <p class="text-slate-700 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
            Notre équipe d'assistance est là pour vous aider à résoudre rapidement vos problèmes et garantir une expérience utilisateur fluide.
          </p>
        </div>
      </div>

      <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8 space-y-10">
        <!-- Canaux de support -->
        <section itemscope itemtype="https://schema.org/ContactPoint">
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <LifeBuoy class="w-6 h-6" /> 1. Canaux de Support
          </h2>
          <div class="grid gap-6 sm:grid-cols-2">
            <div v-for="option in contactOptions" :key="option.title" class="bg-white dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-800 p-6 flex flex-col items-start hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-colors">
              <component :is="option.icon" class="w-7 h-7 mb-2 text-emerald-700 dark:text-emerald-400" />
              <h3 class="font-semibold text-lg mb-1 text-slate-900 dark:text-slate-100" itemprop="contactType">{{ option.title }}</h3>
              <p class="text-slate-700 dark:text-slate-300 text-sm">{{ option.desc }}</p>
            </div>
          </div>
        </section>

        <!-- Types de problèmes supportés -->
        <section>
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <AlertTriangle class="w-6 h-6" /> 2. Types de Problèmes Supportés
          </h2>
          <div class="grid gap-4 sm:grid-cols-2">
            <div v-for="type in problemTypes" :key="type.label" class="flex items-center gap-3 bg-slate-100 dark:bg-slate-800/40 rounded-lg p-4">
              <component :is="type.icon" class="w-6 h-6 text-emerald-700 dark:text-emerald-400" />
              <span class="text-slate-800 dark:text-slate-100">{{ type.label }}</span>
            </div>
          </div>
        </section>

        <!-- Temps de réponse -->
        <section>
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <Clock class="w-6 h-6" /> 3. Temps de Réponse et Disponibilité
          </h2>
          <ul class="space-y-2 text-slate-700 dark:text-slate-300">
            <li>
              <strong>Heures de support :</strong> 7j/7. Les demandes reçues en dehors des heures de bureau (9h-18h) peuvent entraîner un délai de réponse plus long, mais nous répondons sous 24h.
            </li>
            <li>
              <strong>Temps de réponse :</strong> Selon la complexité, résolution entre 1 et 3 jours. Vous serez informé à chaque étape si une intervention technique est nécessaire.
            </li>
          </ul>
        </section>

        <!-- Outils de dépannage -->
        <section>
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <Laptop2 class="w-6 h-6" /> 4. Outils de Dépannage
          </h2>
          <ul class="space-y-2 text-slate-700 dark:text-slate-300">
            <li><strong>Accès à distance (si nécessaire) :</strong> Diagnostic et assistance technique en temps réel.</li>
            <li><strong>Logs d’erreur :</strong> Nous pouvons demander des logs ou captures d'écran pour mieux comprendre le problème.</li>
            <li><strong>Sessions de dépannage en direct :</strong> Pour les utilisateurs premium, accompagnement personnalisé par un technicien.</li>
          </ul>
        </section>

        <!-- Garanties de service -->
        <section>
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <CheckCircle class="w-6 h-6" /> 5. Garanties de Service
          </h2>
          <ul class="space-y-2 text-slate-700 dark:text-slate-300">
            <li><strong>Assistance personnalisée :</strong> Chaque demande est traitée individuellement.</li>
            <li><strong>Suivi des tickets :</strong> Un ticket est créé pour chaque demande, avec suivi et mises à jour régulières.</li>
            <li><strong>Satisfaction client :</strong> Si la solution ne vous convient pas, nous réétudions votre dossier.</li>
          </ul>
        </section>

        <!-- Ressources d'auto-assistance -->
        <section>
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <BookOpen class="w-6 h-6" /> 6. Ressources d'auto-assistance
          </h2>
          <div class="grid gap-4 sm:grid-cols-3">
            <div v-for="item in selfHelp" :key="item.label" class="flex flex-col items-center gap-2 bg-slate-100 dark:bg-slate-800/40 rounded-lg p-4">
              <component :is="item.icon" class="w-7 h-7 text-emerald-700 dark:text-emerald-400" />
              <span class="text-slate-800 dark:text-slate-100 text-center">{{ item.label }}</span>
            </div>
          </div>
        </section>

        <!-- Contactez-nous -->
        <section>
          <h2 class="text-2xl font-semibold text-emerald-700 dark:text-emerald-400 mb-6 flex items-center gap-2">
            <Mail class="w-6 h-6" /> 7. Contactez-nous
          </h2>
          <ul class="space-y-2 text-slate-700 dark:text-slate-300">
            <li><strong>Chat en direct :</strong> Accessible sur toutes les pages du site.</li>
            <li><strong>Email :</strong> <a href="mailto:support@devinsto.com" class="text-emerald-700 dark:text-emerald-400 underline" itemprop="email">support@devinsto.com</a></li>
            <li><strong>Formulaire de contact :</strong> Disponible dans notre centre d’aide en ligne.</li>
          </ul>
        </section>
      </div>
    </main>
    <div class="text-center py-6 border-t border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 text-sm">
      Support technique Devinsto.com – Dernière mise à jour : {{ currentDate }}
    </div>
    <FooterSite />
  </div>
</template>
