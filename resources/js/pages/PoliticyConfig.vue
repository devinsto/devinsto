<!-- filepath: /home/devinsto/sites/devinsto/resources/js/pages/PoliticyConfig.vue -->
<script setup lang="ts">
import { ref, h } from 'vue'
import NavBar from '@/components/NavBar.vue';
import FooterSite from './FooterSite.vue';
import {
  Shield,
  Lock,
  Eye,
  Users,
  Globe,
  Mail,
  FileText,
  ChevronUp,
  ChevronDown
} from 'lucide-vue-next'

interface Section {
  id: string
  title: string
  icon: any
  content: () => ReturnType<typeof h>
}

const droits = [
  { title: 'Accès à vos données', desc: "Demander l'accès aux informations que nous détenons" },
  { title: 'Rectification des données', desc: 'Corriger les informations inexactes ou incomplètes' },
  { title: 'Suppression des données', desc: 'Demander la suppression de vos informations personnelles' },
  { title: 'Opposition ou limitation', desc: "S'opposer au traitement ou demander sa limitation" },
  { title: 'Portabilité des données', desc: 'Recevoir vos données dans un format lisible par machine' }
]

const expandedSections = ref<Record<string, boolean>>({})

const toggleSection = (sectionId: string) => {
  expandedSections.value = {
    ...expandedSections.value,
    [sectionId]: !expandedSections.value[sectionId]
  }
}

const sections: Section[] = [
  {
    id: 'informations-collectees',
    title: '1. Informations Collectées',
    icon: Eye,
    content: () => h('div', { class: 'space-y-4' }, [
      h('div', { class: 'bg-slate-100 dark:bg-slate-800/50 rounded-lg p-4 border border-emerald-100 dark:border-emerald-500/20' }, [
        h('h4', { class: 'text-emerald-700 dark:text-emerald-400 font-semibold mb-2' }, '1.1 Informations que vous nous fournissez directement'),
        h('ul', { class: 'space-y-2 text-slate-700 dark:text-slate-300' }, [
          h('li', [ '• ', h('strong', 'Données personnelles :'), ' nom, adresse e-mail, numéro de téléphone, adresse postale' ]),
          h('li', [ '• ', h('strong', 'Données de paiement :'), ' coordonnées de carte bancaire, informations de compte de paiement' ])
        ])
      ]),
      h('div', { class: 'bg-slate-100 dark:bg-slate-800/50 rounded-lg p-4 border border-emerald-100 dark:border-emerald-500/20' }, [
        h('h4', { class: 'text-emerald-700 dark:text-emerald-400 font-semibold mb-2' }, '1.2 Informations collectées automatiquement'),
        h('ul', { class: 'space-y-2 text-slate-700 dark:text-slate-300' }, [
          h('li', [ '• ', h('strong', 'Cookies :'), ' durée de visite, préférences de navigation, pages consultées' ]),
          h('li', [ '• ', h('strong', 'Données de connexion :'), " adresse IP, type de navigateur, système d'exploitation" ])
        ])
      ]),
      h('div', { class: 'bg-slate-100 dark:bg-slate-800/50 rounded-lg p-4 border border-emerald-100 dark:border-emerald-500/20' }, [
        h('h4', { class: 'text-emerald-700 dark:text-emerald-400 font-semibold mb-2' }, '1.3 Informations provenant de tiers'),
        h('p', { class: 'text-slate-700 dark:text-slate-300' }, 'Données provenant des plateformes sociales (Google, Facebook) lors de la connexion via ces services.')
      ])
    ])
  },
  {
    id: 'utilisation-informations',
    title: '2. Utilisation des Informations Collectées',
    icon: Users,
    content: () => h('div', { class: 'space-y-3' }, [
      ['Fournir nos services', 'Création de compte, gestion des abonnements, accès aux cours et tutoriels.'],
      ["Améliorer l'expérience utilisateur", "Personnalisation du contenu et analyse d'utilisation."],
      ['Communication', 'Informations sur le compte, mises à jour et offres promotionnelles.']
    ].map(([title, desc]) =>
      h('div', { class: 'flex items-start space-x-3 p-3 bg-slate-100 dark:bg-slate-800/30 rounded-lg' }, [
        h('div', { class: 'w-2 h-2 bg-emerald-700 dark:bg-emerald-500 rounded-full mt-2 flex-shrink-0' }),
        h('div', [
          h('strong', { class: 'text-emerald-700 dark:text-emerald-400' }, title as string),
          h('p', { class: 'text-slate-700 dark:text-slate-300 mt-1' }, desc as string)
        ])
      ])
    ))
  },
  {
    id: 'partage-informations',
    title: '3. Partage des Informations',
    icon: Globe,
    content: () => h('div', { class: 'space-y-4' }, [
      h('div', { class: 'bg-emerald-100 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-500/30 rounded-lg p-4' }, [
        h('p', { class: 'text-emerald-700 dark:text-emerald-100 font-medium mb-2' }, '🔒 Engagement de confidentialité'),
        h('p', { class: 'text-slate-700 dark:text-slate-300' }, 'Nous ne vendons ni ne louons vos données personnelles à des tiers.')
      ]),
      h('div', { class: 'space-y-3' }, [
        h('h4', { class: 'text-emerald-700 dark:text-emerald-400 font-semibold' }, 'Partage autorisé dans ces situations :'),
        h('div', { class: 'grid gap-3' }, [
          h('div', { class: 'bg-slate-100 dark:bg-slate-800/50 p-3 rounded-lg border-l-4 border-emerald-700 dark:border-emerald-500' }, [
            h('strong', { class: 'text-slate-800 dark:text-slate-200' }, 'Prestataires de services tiers'),
            h('p', { class: 'text-slate-600 dark:text-slate-400 text-sm mt-1' }, 'Hébergeurs web, processeurs de paiement, services de marketing')
          ]),
          h('div', { class: 'bg-slate-100 dark:bg-slate-800/50 p-3 rounded-lg border-l-4 border-yellow-400 dark:border-yellow-500' }, [
            h('strong', { class: 'text-slate-800 dark:text-slate-200' }, 'Obligations légales'),
            h('p', { class: 'text-slate-600 dark:text-slate-400 text-sm mt-1' }, 'Procédures judiciaires, enquêtes gouvernementales')
          ]),
          h('div', { class: 'bg-slate-100 dark:bg-slate-800/50 p-3 rounded-lg border-l-4 border-blue-400 dark:border-blue-500' }, [
            h('strong', { class: 'text-slate-800 dark:text-slate-200' }, 'Fusion ou acquisition'),
            h('p', { class: 'text-slate-600 dark:text-slate-400 text-sm mt-1' }, 'Transfert dans le cadre de transactions commerciales')
          ])
        ])
      ])
    ])
  },
  {
    id: 'protection-informations',
    title: '4. Protection des Informations',
    icon: Shield,
    content: () => h('div', { class: 'space-y-4' }, [
      h('div', { class: 'bg-gradient-to-r from-emerald-100 dark:from-emerald-900/20 to-slate-100 dark:to-slate-800/20 p-4 rounded-lg border border-emerald-200 dark:border-emerald-500/20' }, [
        h('h4', { class: 'text-emerald-700 dark:text-emerald-400 font-semibold mb-3 flex items-center' }, [
          h(Lock, { class: 'w-4 h-4 mr-2' }),
          'Mesures de sécurité mises en place'
        ]),
        h('div', { class: 'grid sm:grid-cols-2 gap-3' }, [
          ...['Technologies de cryptage', 'Pare-feu avancés', 'Protocoles de sécurité', 'Stockage sécurisé'].map(txt =>
            h('div', { class: 'flex items-center space-x-2' }, [
              h('div', { class: 'w-2 h-2 bg-emerald-700 dark:bg-emerald-500 rounded-full' }),
              h('span', { class: 'text-slate-700 dark:text-slate-300' }, txt)
            ])
          )
        ])
      ]),
      h('div', { class: 'bg-amber-100 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-500/30 rounded-lg p-4' }, [
        h('p', { class: 'text-amber-700 dark:text-amber-100 text-sm' }, [
          h('strong', 'Important :'),
          " Aucune méthode de transmission sur Internet n'est totalement sécurisée. Nous nous efforçons de protéger vos informations mais ne pouvons garantir une sécurité absolue."
        ])
      ])
    ])
  },
  {
    id: 'conservation-informations',
    title: '5. Conservation des Informations',
    icon: FileText,
    content: () => h('div', { class: 'bg-slate-100 dark:bg-slate-800/30 rounded-lg p-4 border border-emerald-200 dark:border-emerald-500/20' }, [
      h('p', { class: 'text-slate-700 dark:text-slate-300 leading-relaxed' },
        "Nous conservons vos informations personnelles aussi longtemps que nécessaire pour remplir les objectifs pour lesquels elles ont été collectées, sauf si la loi impose une période de conservation plus longue. Lorsque nous n'avons plus besoin de vos informations, nous les supprimons ou les rendons anonymes conformément aux normes de sécurité et aux exigences légales."
      )
    ])
  },
  {
    id: 'vos-droits',
    title: '6. Vos Droits',
    icon: Users,
    content: () => h('div', { class: 'space-y-3' }, [
      h('p', { class: 'text-emerald-700 dark:text-emerald-400 font-medium' }, 'Conformément aux lois sur la protection des données, vous disposez des droits suivants :'),
      h('div', { class: 'grid gap-3' }, droits.map((right, index) =>
        h('div', { class: 'flex items-start space-x-3 p-3 bg-slate-100 dark:bg-slate-800/40 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-800/60 transition-colors' }, [
          h('div', { class: 'w-6 h-6 bg-emerald-700 dark:bg-emerald-500 text-slate-100 dark:text-slate-900 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0' }, String(index + 1)),
          h('div', [
            h('strong', { class: 'text-emerald-700 dark:text-emerald-400 block' }, right.title),
            h('p', { class: 'text-slate-600 dark:text-slate-400 text-sm' }, right.desc)
          ])
        ])
      ))
    ])
  }
]
const currentDate = new Date().toLocaleDateString('fr-FR')
</script>

<template>
  <div class="min-h-screen bg-white text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <!-- <div class="min-h-screen bg-gray-50"> -->
        <NavBar />
    <!-- Header -->
    <div class="bg-gradient-to-r from-emerald-100 to-emerald-200 border-b border-emerald-200 dark:from-emerald-500/10 dark:to-emerald-600/10 dark:border-emerald-500/20">
      <div class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="text-center">
          <div class="flex justify-center mb-4">
            <div class="w-16 h-16 bg-emerald-700 dark:bg-emerald-500 rounded-xl flex items-center justify-center">
              <Shield class="w-8 h-8 text-slate-100 dark:text-slate-900" />
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-slate-100 mb-4">
            Politique de Confidentialité
          </h1>
          <p class="text-xl text-emerald-700 dark:text-emerald-400 font-semibold mb-2">Devinsto.com</p>
          <p class="text-slate-700 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
            La protection de votre vie privée et la sécurité de vos données personnelles sont nos priorités. 
            Nous nous engageons à traiter vos données avec soin et dans le respect des lois applicables.
          </p>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
      <div class="space-y-6">
        <div v-for="section in sections" :key="section.id" class="bg-white dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-colors">
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

        <!-- Sections Additionnelles -->
        <div class="grid gap-6 sm:grid-cols-2">
          <div class="bg-white dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-800 p-6 hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-colors">
            <h3 class="text-lg font-semibold text-emerald-700 dark:text-emerald-400 mb-3 flex items-center">
              <Globe class="w-5 h-5 mr-2" />
              7. Transfert International
            </h3>
            <p class="text-slate-700 dark:text-slate-300 text-sm leading-relaxed">
              Devinsto.com peut traiter vos informations dans différents pays. Nous nous assurons que tout 
              transfert respecte les exigences légales en matière de protection des données.
            </p>
          </div>
          <div class="bg-white dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-800 p-6 hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-colors">
            <h3 class="text-lg font-semibold text-emerald-700 dark:text-emerald-400 mb-3 flex items-center">
              <FileText class="w-5 h-5 mr-2" />
              8. Modifications
            </h3>
            <p class="text-slate-700 dark:text-slate-300 text-sm leading-relaxed">
              Nous nous réservons le droit de modifier cette politique à tout moment. 
              Les modifications seront publiées sur cette page avec la date de mise à jour.
            </p>
          </div>
        </div>

        <!-- Section Contact -->
        <div class="bg-gradient-to-r from-emerald-100 dark:from-emerald-900/20 to-slate-100 dark:to-slate-800/20 rounded-xl border border-emerald-200 dark:border-emerald-500/20 p-6">
          <h3 class="text-xl font-semibold text-emerald-700 dark:text-emerald-400 mb-4 flex items-center">
            <Mail class="w-5 h-5 mr-2" />
            9. Contact
          </h3>
          <p class="text-slate-700 dark:text-slate-300 mb-4">
            Si vous avez des questions concernant cette Politique de Confidentialité ou le traitement 
            de vos données personnelles, n'hésitez pas à nous contacter :
          </p>
          <div class="space-y-2">
            <div class="flex items-center space-x-3 text-slate-700 dark:text-slate-300">
              <Mail class="w-4 h-4 text-emerald-700 dark:text-emerald-500" />
              <span>[adresse e-mail de contact]</span>
            </div>
            <div class="flex items-center space-x-3 text-slate-700 dark:text-slate-300">
              <FileText class="w-4 h-4 text-emerald-700 dark:text-emerald-500" />
              <span>Via notre formulaire de contact</span>
            </div>
          </div>
        </div>

        <!-- Footer -->
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
    <FooterSite/>
  </div>
</template>

