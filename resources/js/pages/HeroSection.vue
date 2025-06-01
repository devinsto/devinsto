<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Button } from '@/components/ui/button';
import { Link, usePage  } from '@inertiajs/vue3';


// Récupère l'utilisateur connecté depuis Inertia
const page = usePage<{ auth: { user: any } }>();
const user = page.props.auth.user;
</script>

<template>
    <div class="heroSection flex relative mb-12 py-20 ">
        <!-- Conteneur du logo avec animation -->

        <div class="logo-wrapper mx-auto w-fit mb-10 animate-float ">
            <AppLogoIcon class="enlarged-logo" />
           
        </div>
        <div class="text-center">
               <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight ">
                <span class="text-green-500 text-7xl">Devinsto</span>
                <br>
                <span class="">Apprenez, Créez, Collaborez sans limites.</span>
            </h1>
            
            <p class="mt-6 text-2xl ">
                La plateforme ultime pour apprendre, collaborer et construire des projets en développement web,
                graphisme, et bien plus encore.
            </p>
            
            <div class="flex   gap-4 justify-center items-center mt-10">
                <Link v-if="!user" href="/login">
                    <Button variant="default" size="lg" class="px-8 bg-green-600 hover:bg-green-700 transition-colors">
                        Créer un compte
                    </Button>
                </Link>
                <Link href="/courses">
                    <Button variant="outline" size="lg" class="px-8 text-2xl py-3  bg-green-600 hover:bg-green-700 transition-colors">
                        Parcourir les cours
                    </Button>
                </Link>
            </div>
      
        </div>
         

      
    </div>
</template>

<style scoped>
.heroSection {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.logo-wrapper {
    transform: scale(1);
    transition: transform 0.3s ease;
}

.enlarged-logo {
    filter: drop-shadow(0 0 15px rgba(0, 179, 89, 0.5));
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) scale(3);
    }
    50% {
        transform: translateY(-10px) scale(3.05);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

@media (min-width: 768px) {
    .logo-wrapper {
        transform: scale(5);
        margin-bottom: 3rem;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0) scale(4);
        }
        50% {
            transform: translateY(-15px) scale(4.05);
        }
    }
}

/* Adaptation du composant AppLogoIcon */
.svgBox {
    width: 90px !important;
    height: 97px !important;
}

.svgBox svg {
    width: 96.427px !important;
    height: 77.88px !important;
    transform: scale(1.5) !important;
}
</style>
