<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { computed, onMounted, ref } from 'vue';

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
    { id: 'metrics', label: 'Metrics', description: "Monitor your app's performance with built-in metrics" },
    { id: 'command-palette', label: 'Command palette', description: 'Everything you need is just a few keystrokes away' },
];

const content = computed<(LogEntry | CommandEntry | MetricEntry | PaletteEntry)[]>(() => {
    const data = {
        logs: [
            {
                time: '15:01:32.471 UTC',
                job: 'App\\Jobs\\UploadFile',
                duration: '26.07ms',
                status: 'DONE',
                endTime: '15:02:42.134 UTC',
                message: 'INFO: Sending daily digest',
            },
            { time: '15:03:23.421 UTC', job: 'App\\Jobs\\UploadFile', status: 'RUNNING' },
            {
                time: '15:03:54.948 UTC',
                job: 'App\\Jobs\\UploadFile',
                status: 'ERROR',
                error: 'Error: failed to upload file to the server',
                details: 'class: App\\Exceptions\\FileUploadException file: /var/www/html/routes/web.php:22',
            },
        ],
        commands: [
            {
                time: '15:03:54.948 UTC',
                command: 'php artisan queue:work database --quiet',
                source: 'cloud-init',
                message: 'starting service',
                instance: '3',
                level: 'INFO',
            },
        ],
        metrics: [
            { metric: 'CPU Usage', value: '24%', trend: 'up' },
            { metric: 'Memory Usage', value: '1.2GB/2GB', trend: 'stable' },
            { metric: 'Disk I/O', value: '45MB/s', trend: 'down' },
        ],
        'command-palette': [
            { shortcut: 'Ctrl+K', action: 'Open command palette' },
            { shortcut: 'Ctrl+L', action: 'Focus logs' },
            { shortcut: 'Ctrl+M', action: 'Show metrics' },
        ],
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
    
    <section class="bg-white px-4 py-12 sm:px-6 lg:px-8 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white">Everything you need, included</h2>
            <p class="mb-12 text-lg text-gray-600 dark:text-gray-300">
                Monitor and debug effortlessly with streamlined logs, commands, metrics, and resource navigation.
            </p>

            <div class="flex flex-col gap-8 border-l-2 border-l-green-100 md:flex-row">
                <!-- Navigation tabs -->
                <div
                    class="flex gap-1 overflow-x-auto pb-4 md:flex-col md:pb-0"
                    :class="{
                        'flex-row': isMobile,
                        'w-64 flex-col': !isMobile,
                    }"
                >
                    <button
                        v-for="tab in tabs"
                        :key="tab.id"
                        @click="activeTab = tab.id as TabType"
                        class="rounded-lg px-4 py-3 text-left transition-colors"
                        :class="{
                            'rounded-none border-l-3 border-l-green-500 bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400':
                                activeTab === tab.id,
                            'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800': activeTab !== tab.id,
                            'whitespace-nowrap': isMobile,
                        }"
                    >
                        <div class="font-medium">{{ tab.label }}</div>
                        <div class="text-sm opacity-80">{{ tab.description }}</div>
                    </button>
                </div>

                <!-- Content area -->
                <div class="min-h-[400px] flex-1 rounded-xl bg-gray-50 p-6 dark:bg-gray-800">
                    <!-- Logs content -->
                    <div v-if="activeTab === 'logs'" class="space-y-4">
                        <div v-for="(log, index) in content as LogEntry[]" :key="index" class="rounded-lg bg-white p-4 shadow-sm dark:bg-gray-700">
                            <div class="flex items-start gap-4">
                                <div class="w-24 flex-shrink-0 text-xs text-gray-500 dark:text-gray-400">{{ log.time }}</div>
                                <div class="flex-1">
                                    <div class="font-mono text-sm">{{ log.job }}</div>
                                    <div v-if="log.duration" class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        {{ log.duration }} <span class="ml-2">{{ log.endTime }}</span>
                                    </div>
                                    <div
                                        v-if="log.message"
                                        class="mt-1 text-sm"
                                        :class="{
                                            'text-green-600 dark:text-green-400': log.status === 'DONE',
                                            'text-blue-600 dark:text-blue-400': log.status === 'RUNNING',
                                            'text-red-600 dark:text-red-400': log.status === 'ERROR',
                                        }"
                                    >
                                        {{ log.message }}
                                    </div>
                                    <div v-if="log.error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ log.error }}</div>
                                    <div v-if="log.details" class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ log.details }}</div>
                                </div>
                                <div
                                    v-if="log.status"
                                    class="rounded-full px-2 py-1 text-xs"
                                    :class="{
                                        'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200': log.status === 'DONE',
                                        'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-200': log.status === 'RUNNING',
                                        'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200': log.status === 'ERROR',
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
                            class="rounded-lg bg-white p-4 shadow-sm dark:bg-gray-700"
                        >
                            <div class="flex items-start gap-4">
                                <div class="w-24 flex-shrink-0 text-xs text-gray-500 dark:text-gray-400">{{ cmd.time }}</div>
                                <div class="flex-1">
                                    <div class="rounded bg-gray-100 px-2 py-1 font-mono text-sm dark:bg-gray-600">
                                        {{ cmd.command }}
                                    </div>
                                    <div class="mt-2 text-sm"><span class="text-gray-500 dark:text-gray-400">source:</span> {{ cmd.source }}</div>
                                    <div
                                        class="mt-1 text-sm"
                                        :class="{
                                            'text-blue-600 dark:text-blue-400': cmd.level === 'INFO',
                                            'text-green-600 dark:text-green-400': cmd.level === 'SUCCESS',
                                        }"
                                    >
                                        {{ cmd.message }}
                                    </div>
                                    <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                        instance: {{ cmd.instance }} • level: {{ cmd.level }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Metrics content -->
                    <div v-if="activeTab === 'metrics'" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div
                            v-for="(metric, index) in content as MetricEntry[]"
                            :key="index"
                            class="rounded-lg bg-white p-4 shadow-sm dark:bg-gray-700"
                        >
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ metric.metric }}</div>
                                    <div class="mt-1 text-xl font-semibold">{{ metric.value }}</div>
                                </div>
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-full"
                                    :class="{
                                        'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400': metric.trend === 'up',
                                        'bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400': metric.trend === 'down',
                                        'bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400': metric.trend === 'stable',
                                    }"
                                >
                                    <svg
                                        v-if="metric.trend === 'up'"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <svg
                                        v-else-if="metric.trend === 'down'"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M12 13a1 1 0 100 2h5a1 1 0 001-1v-5a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586l-4.293-4.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd"
                                        />
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
                            class="flex items-center rounded-lg bg-white p-4 shadow-sm dark:bg-gray-700"
                        >
                            <div class="mr-4 rounded bg-gray-100 px-2 py-1 font-mono text-sm dark:bg-gray-600">
                                {{ item.shortcut }}
                            </div>
                            <div class="text-gray-700 dark:text-gray-300">{{ item.action }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white px-4 py-12 sm:px-6 lg:px-8 dark:bg-gray-900">
     gggg   
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
