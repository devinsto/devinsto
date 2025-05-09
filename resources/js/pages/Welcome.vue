<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { ref, computed, onMounted } from 'vue';

type TabType = 'logs' | 'commands' | 'metrics' | 'command-palette';

interface LogEntry {
  time: string;
  job?: string;
  duration?: string;
  status?: string;
  endTime?: string;
  message?: string;
  error?: string;
  details?: string;
}

interface CommandEntry {
  time: string;
  command: string;
  source: string;
  message: string;
  instance: string;
  level: string;
}

interface MetricEntry {
  metric: string;
  value: string;
  trend: string;
}

interface PaletteEntry {
  shortcut: string;
  action: string;
}

const activeTab = ref<TabType>('logs');
const isMobile = ref(false);

const checkMobile = () => {
  isMobile.value = window.innerWidth < 768;
};

const tabs = [
  { id: 'logs', label: 'Logs', description: 'Application and access logs let you debug your app easily' },
  { id: 'commands', label: 'Commands', description: 'Run any command, such as migrations, tests, or custom scripts' },
  { id: 'metrics', label: 'Metrics', description: 'Monitor your app\'s performance with built-in metrics' },
  { id: 'command-palette', label: 'Command palette', description: 'Everything you need is just a few keystrokes away' }
];

const content = computed<(LogEntry | CommandEntry | MetricEntry | PaletteEntry)[]>(() => {
  const data = {
    logs: [
      { time: '15:01:32.471 UTC', job: 'App\\Jobs\\UploadFile', duration: '26.07ms', status: 'DONE', endTime: '15:02:42.134 UTC', message: 'INFO: Sending daily digest' },
      { time: '15:03:23.421 UTC', job: 'App\\Jobs\\UploadFile', status: 'RUNNING' },
      { time: '15:03:54.948 UTC', job: 'App\\Jobs\\UploadFile', status: 'ERROR', error: 'Error: failed to upload file to the server', details: 'class: App\\Exceptions\\FileUploadException file: /var/www/html/routes/web.php:22' }
    ],
    commands: [
      { time: '15:03:54.948 UTC', command: 'php artisan queue:work database --quiet', source: 'cloud-init', message: 'starting service', instance: '3', level: 'INFO' }
    ],
    metrics: [
      { metric: 'CPU Usage', value: '24%', trend: 'up' },
      { metric: 'Memory Usage', value: '1.2GB/2GB', trend: 'stable' },
      { metric: 'Disk I/O', value: '45MB/s', trend: 'down' }
    ],
    'command-palette': [
      { shortcut: 'Ctrl+K', action: 'Open command palette' },
      { shortcut: 'Ctrl+L', action: 'Focus logs' },
      { shortcut: 'Ctrl+M', action: 'Show metrics' }
    ]
  };
  
  return data[activeTab.value] || [];
});

onMounted(() => {
  checkMobile();
  window.addEventListener('resize', checkMobile);
});
</script>

<template>
  <NavBar />
  <div class="welcome-container p-6">
    <h1 class="text-4xl font-bold mb-4">Bienvenue sur notre plateforme d'apprentissage</h1>
    <p>Explorez nos cours, articles de blog et plus encore pour enrichir vos compétences.</p>
  </div>
  <section class="bg-white dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Everything you need, included</h2>
      <p class="text-lg text-gray-600 dark:text-gray-300 mb-12">
        Monitor and debug effortlessly with streamlined logs, commands, metrics, and resource navigation.
      </p>

      <div class="flex flex-col md:flex-row gap-8 border-l-green-100 border-l-2">
        <!-- Navigation tabs -->
        <div 
          class="flex md:flex-col overflow-x-auto pb-4 md:pb-0 gap-1"
          :class="{
            'flex-row': isMobile,
            'flex-col w-64': !isMobile
          }"
        >
          <button
            v-for="tab in tabs"
            :key="tab.id"
            @click="activeTab = tab.id as TabType"
            class="px-4 py-3 text-left rounded-lg transition-colors"
            :class="{
              'bg-blue-50 border-l-green-500 border-l-3 rounded-none dark:bg-blue-900/30 text-blue-600 dark:text-blue-400': activeTab === tab.id,
              'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300': activeTab !== tab.id,
              'whitespace-nowrap': isMobile
            }"
          >
            <div class="font-medium">{{ tab.label }}</div>
            <div class="text-sm opacity-80">{{ tab.description }}</div>
          </button>
        </div>

        <!-- Content area -->
        <div class="flex-1 bg-gray-50 dark:bg-gray-800 rounded-xl p-6 min-h-[400px]">
          <!-- Logs content -->
          <div v-if="activeTab === 'logs'" class="space-y-4">
            <div 
              v-for="(log, index) in content as LogEntry[]" 
              :key="index" 
              class="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm"
            >
              <div class="flex items-start gap-4">
                <div class="text-xs text-gray-500 dark:text-gray-400 w-24 flex-shrink-0">{{ log.time }}</div>
                <div class="flex-1">
                  <div class="font-mono text-sm">{{ log.job }}</div>
                  <div v-if="log.duration" class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ log.duration }} <span class="ml-2">{{ log.endTime }}</span>
                  </div>
                  <div v-if="log.message" class="text-sm mt-1" :class="{
                    'text-green-600 dark:text-green-400': log.status === 'DONE',
                    'text-blue-600 dark:text-blue-400': log.status === 'RUNNING',
                    'text-red-600 dark:text-red-400': log.status === 'ERROR'
                  }">
                    {{ log.message }}
                  </div>
                  <div v-if="log.error" class="text-red-600 dark:text-red-400 text-sm mt-1">{{ log.error }}</div>
                  <div v-if="log.details" class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ log.details }}</div>
                </div>
                <div 
                  v-if="log.status" 
                  class="px-2 py-1 text-xs rounded-full" 
                  :class="{
                    'bg-green-100 dark:bg-green-900/50 text-green-800 dark:text-green-200': log.status === 'DONE',
                    'bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-200': log.status === 'RUNNING',
                    'bg-red-100 dark:bg-red-900/50 text-red-800 dark:text-red-200': log.status === 'ERROR'
                  }"
                >
                  {{ log.status }}
                </div>
              </div>
            </div>
          </div>

          <!-- Commands content -->
          <div v-if="activeTab === 'commands'" class="space-y-4">
            <div 
              v-for="(cmd, index) in content as CommandEntry[]" 
              :key="index" 
              class="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm"
            >
              <div class="flex items-start gap-4">
                <div class="text-xs text-gray-500 dark:text-gray-400 w-24 flex-shrink-0">{{ cmd.time }}</div>
                <div class="flex-1">
                  <div class="font-mono text-sm bg-gray-100 dark:bg-gray-600 px-2 py-1 rounded">
                    {{ cmd.command }}
                  </div>
                  <div class="text-sm mt-2">
                    <span class="text-gray-500 dark:text-gray-400">source:</span> {{ cmd.source }}
                  </div>
                  <div class="text-sm mt-1" :class="{
                    'text-blue-600 dark:text-blue-400': cmd.level === 'INFO',
                    'text-green-600 dark:text-green-400': cmd.level === 'SUCCESS'
                  }">
                    {{ cmd.message }}
                  </div>
                  <div class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    instance: {{ cmd.instance }} • level: {{ cmd.level }}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Metrics content -->
          <div v-if="activeTab === 'metrics'" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div 
              v-for="(metric, index) in content as MetricEntry[]" 
              :key="index" 
              class="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm"
            >
              <div class="flex justify-between items-start">
                <div>
                  <div class="text-gray-500 dark:text-gray-400 text-sm">{{ metric.metric }}</div>
                  <div class="text-xl font-semibold mt-1">{{ metric.value }}</div>
                </div>
                <div class="w-8 h-8 rounded-full flex items-center justify-center" :class="{
                  'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400': metric.trend === 'up',
                  'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400': metric.trend === 'down',
                  'bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400': metric.trend === 'stable'
                }">
                  <svg v-if="metric.trend === 'up'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                  </svg>
                  <svg v-else-if="metric.trend === 'down'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 13a1 1 0 100 2h5a1 1 0 001-1v-5a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586l-4.293-4.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" clip-rule="evenodd" />
                  </svg>
                  <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Command palette content -->
          <div v-if="activeTab === 'command-palette'" class="space-y-4">
            <div 
              v-for="(item, index) in content as PaletteEntry[]" 
              :key="index" 
              class="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm flex items-center"
            >
              <div class="bg-gray-100 dark:bg-gray-600 px-2 py-1 rounded font-mono text-sm mr-4">
                {{ item.shortcut }}
              </div>
              <div class="text-gray-700 dark:text-gray-300">{{ item.action }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.welcome-container {
  background-color: #f9f9f9;
  border-radius: 8px;
}
</style>
<!-- Principales corrections apportées :
Typage des données :

Ajout d'interfaces spécifiques pour chaque type d'entrée (LogEntry, CommandEntry, MetricEntry, PaletteEntry)
Meilleure gestion des propriétés optionnelles avec ?
Correction du problème 'status' :

La propriété status est maintenant correctement typée dans l'interface LogEntry
Vérification d'existence avec v-if="log.status" avant l'utilisation
Typage fort du contenu :

Utilisation de casts explicites (as LogEntry[], etc.) dans le template
Meilleure sécurité type lors de l'accès aux propriétés
Structure améliorée :

Séparation claire des différents types de données
Code plus maintenable et plus facile à étendre
Gestion des cas optionnels :

Toutes les propriétés non obligatoires sont marquées comme optionnelles
Affichage conditionnel des éléments avec v-if
Ces corrections garantissent que TypeScript comprend correctement la structure de vos données et évite les erreurs de compilation tout en maintenant une excellente expérience utilisateur. -->
