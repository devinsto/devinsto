<!-- filepath: /home/devinsto/sites/devinsto/resources/js/pages/CguConfig.vue -->
<script setup lang="ts">
import { ref, h } from 'vue'
import NavBar from '@/components/NavBar.vue'
import FooterSite from './FooterSite.vue'
import {
  FileText,
  User,
  Lock,
  Users,
  Globe,
  Mail,
  Shield,
  ChevronUp,
  ChevronDown
} from 'lucide-vue-next'

interface Section {
  id: string
  title: string
  icon: any
  content: () => ReturnType<typeof h>
}

const expandedSections = ref<Record<string, boolean>>({})
const toggleSection = (sectionId: string) => {
  expandedSections.value = {
    ...expandedSections.value,
    [sectionId]: !expandedSections.value[sectionId]
  }
}

const sections: Section[] = [
  {
    id: 'introduction',
    title: '1. Introduction',
    icon: FileText,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300 space-y-2' }, [
      h('p', 'Les présentes CGU régissent l\'utilisation de Devinsto.com (ci-après, "le Site"), y compris les services d\'apprentissage, de création, de développement web, mobile, graphique et de gestion de la visibilité en ligne. En utilisant le Site, vous acceptez de respecter et d’être lié par ces conditions. Si vous n’acceptez pas ces termes, vous ne devez pas utiliser notre plateforme.')
    ])
  },
  {
    id: 'acces-service',
    title: '2. Accès au Service',
    icon: User,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300 space-y-3' }, [
      h('p', 'Devinsto.com est accessible à toute personne disposant d\'une connexion Internet. Toutefois, l\'accès à certaines fonctionnalités ou services peut nécessiter l\'inscription d\'un compte utilisateur. En vous inscrivant sur le site, vous garantissez que toutes les informations fournies sont exactes et à jour.'),
      h('h4', { class: 'font-semibold text-emerald-700 dark:text-emerald-400' }, '2.1 Création de compte'),
      h('p', 'Pour accéder à certains services de Devinsto.com, vous devrez créer un compte utilisateur. Lors de l\'inscription, vous vous engagez à fournir des informations exactes, complètes et à jour. Vous êtes responsable de la confidentialité de vos identifiants et mots de passe. Toute activité réalisée sous votre compte vous est attribuée.'),
      h('h4', { class: 'font-semibold text-emerald-700 dark:text-emerald-400' }, '2.2 Utilisation des Services'),
      h('ul', { class: 'list-disc ml-6 space-y-1' }, [
        h('li', 'Formation en programmation (web, mobile, etc.)'),
        h('li', 'Création graphique (utilisation d\'outils comme Illustrator, Photoshop, etc.)'),
        h('li', 'Déploiement de sites sur VPS et Coolify'),
        h('li', 'Services de maintenance et création de sites WordPress'),
        h('li', 'Forum et communauté d’apprentissage')
      ]),
      h('p', 'Vous vous engagez à utiliser ces services uniquement à des fins légales, conformément aux lois applicables, et à respecter les bonnes pratiques professionnelles.')
    ])
  },
  {
    id: 'obligations-utilisateur',
    title: "3. Obligations de l'Utilisateur",
    icon: Users,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300 space-y-2' }, [
      h('ul', { class: 'list-disc ml-6 space-y-1' }, [
        h('li', 'Ne pas violer la propriété intellectuelle de Devinsto ou de tiers, y compris le contenu de formation, les designs, et les ressources fournies par la plateforme.'),
        h('li', 'Ne pas utiliser de manière abusive les services proposés (par exemple, envoyer des spams, tenter de pirater le site, etc.).'),
        h('li', 'Ne pas publier de contenu offensant, illégal, diffamatoire, ou préjudiciable envers Devinsto ou ses utilisateurs.'),
        h('li', 'Respecter les droits de confidentialité des autres utilisateurs et ne pas collecter ou partager leurs informations personnelles sans leur consentement.')
      ])
    ])
  },
  {
    id: 'propriete-intellectuelle',
    title: '4. Propriété Intellectuelle',
    icon: Shield,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300' }, [
      h('p', 'Tout le contenu proposé sur Devinsto.com (textes, vidéos, graphiques, logos, conceptions de sites web, cours, etc.) est la propriété exclusive de Devinsto ou de ses partenaires et est protégé par les lois sur la propriété intellectuelle. Vous n\'êtes pas autorisé à reproduire, distribuer, vendre, ou modifier le contenu sans l\'autorisation expresse de Devinsto.')
    ])
  },
  {
    id: 'tarifs-abonnements',
    title: '5. Tarifs et Abonnements',
    icon: FileText,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300 space-y-2' }, [
      h('p', 'Devinsto.com propose des services gratuits ainsi que des services premium nécessitant un abonnement. Les abonnements premium sont régis par des conditions spécifiques, détaillées lors de l\'achat de l\'abonnement.'),
      h('h4', { class: 'font-semibold text-emerald-700 dark:text-emerald-400' }, '5.1 Paiement'),
      h('p', 'Les paiements pour les abonnements premium doivent être effectués via les moyens de paiement acceptés par Devinsto.com. Tous les paiements sont effectués en ligne et sont soumis à des conditions spécifiques.'),
      h('h4', { class: 'font-semibold text-emerald-700 dark:text-emerald-400' }, '5.2 Annulation et Remboursement'),
      h('p', 'Les abonnements premium peuvent être annulés à tout moment, mais aucune somme ne sera remboursée pour les périodes déjà consommées. Le remboursement peut être possible dans des cas spécifiques (par exemple, si vous avez été facturé par erreur). Ces détails sont précisés dans la section “Politique de Remboursement” sur le Site.')
    ])
  },
  {
    id: 'responsabilite',
    title: '6. Responsabilité',
    icon: Lock,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300 space-y-2' }, [
      h('p', 'Devinsto.com fournit ses services "en l\'état", sans garantie d\'aucune sorte, expresse ou implicite. Nous nous efforçons d\'assurer la qualité et la disponibilité de notre plateforme, mais ne garantissons pas que les services seront ininterrompus, sécurisés ou sans erreurs.'),
      h('h4', { class: 'font-semibold text-emerald-700 dark:text-emerald-400' }, '6.1 Limitation de Responsabilité'),
      h('p', 'Devinsto.com ne pourra être tenu responsable des pertes ou dommages directs ou indirects résultant de l’utilisation des services ou de l’impossibilité d’utiliser la plateforme, y compris en cas de défaillance technique, de perte de données ou de tout autre problème lié aux services fournis.')
    ])
  },
  {
    id: 'confidentialite',
    title: '7. Confidentialité et Protection des Données',
    icon: Lock,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300' }, [
      h('p', 'La collecte et l’utilisation de vos données personnelles sont régies par notre Politique de Confidentialité, disponible sur le Site. En acceptant ces CGU, vous consentez à ce que vos données soient utilisées conformément à cette politique.')
    ])
  },
  {
    id: 'modifications',
    title: '8. Modifications des CGU',
    icon: FileText,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300' }, [
      h('p', 'Devinsto se réserve le droit de modifier, à tout moment, les présentes Conditions Générales d\'Utilisation. En cas de modification substantielle, une notification sera envoyée à l’adresse e-mail associée à votre compte. Si vous continuez à utiliser le service après la modification des CGU, cela signifie que vous acceptez les nouvelles conditions.')
    ])
  },
  {
    id: 'duree-resiliation',
    title: '9. Durée et Résiliation',
    icon: Users,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300' }, [
      h('p', 'Ces CGU s’appliquent pendant toute la durée d\'utilisation de Devinsto.com. Vous pouvez mettre fin à votre utilisation du Site à tout moment en supprimant votre compte. Devinsto se réserve le droit de suspendre ou de résilier l’accès à votre compte en cas de violation de ces conditions, sans préavis.')
    ])
  },
  {
    id: 'droit-applicable',
    title: '10. Droit Applicable et Juridiction',
    icon: Globe,
    content: () => h('div', { class: 'text-slate-700 dark:text-slate-300' }, [
      h('p', 'Les présentes CGU sont régies par le droit en vigueur dans le pays où Devinsto.com est enregistré. Tout litige lié à l’utilisation de la plateforme sera soumis à la compétence exclusive des juridictions compétentes.')
    ])
  }
]

const currentDate = new Date().toLocaleDateString('fr-FR')
</script>

<template>
  <div class="min-h-screen bg-white text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <NavBar />
    <div class="bg-gradient-to-r from-emerald-100 to-emerald-200 border-b border-emerald-200 dark:from-emerald-500/10 dark:to-emerald-600/10 dark:border-emerald-500/20">
      <div class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="text-center">
          <div class="flex justify-center mb-4">
            <div class="w-16 h-16 bg-emerald-700 dark:bg-emerald-500 rounded-xl flex items-center justify-center">
              <FileText class="w-8 h-8 text-slate-100 dark:text-slate-900" />
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-slate-100 mb-4">
            Conditions Générales d'Utilisation (CGU)
          </h1>
          <p class="text-xl text-emerald-700 dark:text-emerald-400 font-semibold mb-2">Devinsto.com</p>
          <p class="text-slate-700 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
            L’utilisation de notre site web, de nos services et de notre contenu est soumise aux présentes Conditions Générales d'Utilisation (CGU). En accédant à Devinsto.com, vous acceptez les termes et conditions ci-dessous.
          </p>
        </div>
      </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
      <div class="space-y-6">
        <div
          v-for="section in sections"
          :key="section.id"
          class="bg-white dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-colors"
        >
          <button
            @click="toggleSection(section.id)"
            class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-slate-100 dark:hover:bg-slate-800/30 transition-colors"
          >
            <div class="flex items-center space-x-3">
              <div class="text-emerald-700 dark:text-emerald-500">
                <component :is="section.icon" class="w-5 h-5" />
              </div>
              <h2 class="text-xl font-semibold text-slate-900 dark:text-slate-100">
                {{ section.title }}
              </h2>
            </div>
            <div class="text-emerald-700 dark:text-emerald-500">
              <ChevronUp v-if="expandedSections[section.id]" class="w-5 h-5" />
              <ChevronDown v-else class="w-5 h-5" />
            </div>
          </button>
          <div v-if="expandedSections[section.id]" class="px-6 pb-6 border-t border-slate-200 dark:border-slate-800">
            <div class="pt-4">
              <component :is="section.content" />
            </div>
          </div>
        </div>

        <!-- Footer CGU -->
        <div class="text-center py-8 border-t border-slate-200 dark:border-slate-800">
          <p class="text-slate-600 dark:text-slate-400 text-sm">
            Dernière mise à jour : {{ currentDate }}
          </p>
          <div class="mt-4 flex justify-center space-x-6">
            <button class="text-emerald-700 dark:text-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors text-sm font-medium">
              Retour au site
            </button>
            <button class="text-emerald-700 dark:text-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors text-sm font-medium">
              Nous contacter
            </button>
          </div>
        </div>
      </div>
    </div>
    <FooterSite />
  </div>
</template>
