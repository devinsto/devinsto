<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import Welcome3 from './Welcome3.vue';
import Welcome2 from './Welcome2.vue';
import HeroSection from './HeroSection.vue';
import FooterSite from './FooterSite.vue';
import PoliticyConfig from './PoliticyConfig.vue';
</script>
<template>
    <NavBar />
    <section class=" px-4 py-12 sm:px-6 lg:px-8  dark:bg-gray-900">
        <div class="mx-auto max-w-7xl"> 
    
            <HeroSection />
            <Welcome3 class="mt-4 "/>
            <Welcome2 />
          
        </div>
    </section>
    <FooterSite />
    


</template>
<style scoped>
#dim {
    transform: scale(4.3);
}

</style>
