<template>
    <Head title="Welcome">
      <link rel="preconnect" href="https://example.com" />
      <link rel="stylesheet" href="https://example.com/styles.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8">
      <Navbar />
      <main class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
        <div class="flex w-full flex-col items-center justify-center p-6 lg:p-8">
          <h1 class="mb-4 text-3xl font-bold text-center text-primary">Bienvenue sur notre application</h1>
          <p class="mb-6 text-center text-muted-foreground">Explorez nos formations, découvrez notre blog, ou apprenez-en plus à propos de nous.</p>
        </div>
      </main>
    </div>
  </template>
  
  <script setup lang="ts">
  import { Head } from '@inertiajs/vue3';
  import Navbar from '../components/Navbar.vue';
  </script>
  