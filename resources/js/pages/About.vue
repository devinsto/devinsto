<script setup lang="ts">
import NavBar from '@/Components/NavBar.vue'
</script>

<template>
  <NavBar />
  <div :class="['about-container', theme]" class="p-7">
    <h1 class="text-4xl font-bold mb-4">À Propos de Nous</h1>
    <p class="mb-4">
      <strong>À propos de Devinsto.com</strong><br />
      Chez Devinsto.com, nous avons pour mission de créer une plateforme complète et accessible pour tous ceux qui souhaitent apprendre, créer, et innover dans le monde du développement, du graphisme, et du web. Nous avons conçu notre espace pour qu’il soit un point de rencontre entre les passionnés, les créateurs, et les professionnels, où chacun peut progresser à son rythme, collaborer, et donner vie à ses projets. Notre engagement repose sur l'accompagnement des utilisateurs à travers une expérience d'apprentissage unique et enrichissante, tout en offrant les outils nécessaires pour créer et partager des projets numériques professionnels.
    </p>

    <hr class="my-6" />

    <h2 class="text-3xl font-bold mb-4">Notre Mission</h2>
    <p class="mb-4">
      Notre mission chez Devinsto.com est de démocratiser l'accès aux ressources éducatives et aux outils de création, qu’il s’agisse de programmation, de design graphique ou de gestion de projets numériques. Nous croyons que l’éducation et la créativité sont les moteurs du progrès, et nous nous efforçons de fournir un environnement où chaque utilisateur peut acquérir des compétences pratiques et immédiatement applicables.
    </p>
    <p class="mb-4">
      Nous souhaitons donner à chacun les moyens de développer ses talents, de créer des projets innovants et de bâtir sa présence en ligne, que ce soit en tant que développeur, designer ou entrepreneur numérique.
    </p>

    <h3 class="text-2xl font-semibold mb-2">Objectifs clés de Devinsto :</h3>
    <ul class="list-disc pl-6 mb-4">
      <li>Apprendre sans limite : Offrir une formation de qualité dans des domaines divers tels que la programmation web (PHP, JavaScript, C#, etc.), le design graphique (Illustrator, Photoshop, XD, etc.), et le développement mobile (Flutter, Dart).</li>
      <li>Créer des projets : Fournir des outils et des ressources pour aider les utilisateurs à concrétiser leurs idées, avec des outils de création de site web, de maintenance sur WordPress, ainsi que des solutions de déploiement sur des plateformes comme VPS ou Coolify.</li>
      <li>Collaborer et partager : Construire une communauté active et impliquée, où les utilisateurs peuvent échanger, se soutenir et partager leurs expériences et projets.</li>
    </ul>
    <p>
      Nous sommes convaincus que Devinsto.com n’est pas seulement une plateforme, mais un véritable écosystème où les idées prennent vie, et où la collaboration est au cœur de chaque action.
    </p>

    <hr class="my-6" />

    <h2 class="text-3xl font-bold mb-4">Notre Équipe et Nos Valeurs</h2>
    <p class="mb-4">
      Devinsto.com est dirigé par une équipe de professionnels passionnés par l’innovation, l’éducation et la technologie. Notre équipe est constituée de développeurs, de designers, de formateurs et d’entrepreneurs, chacun apportant une expertise unique pour soutenir les utilisateurs dans leur parcours d'apprentissage et de création.
    </p>
    <p class="mb-4">
      Nous partageons des valeurs essentielles qui guident nos actions et nos choix au quotidien :
    </p>
    <ul class="list-disc pl-6 mb-4">
      <li><strong>Passion pour l’apprentissage :</strong> Nous croyons que l'éducation est un levier puissant pour améliorer la vie des individus et des communautés. C'est pourquoi nous nous efforçons d’offrir un contenu de qualité, accessible à tous, tout en étant constamment à la pointe des dernières tendances et technologies.</li>
      <li><strong>Créativité et innovation :</strong> Nous encourageons la pensée créative et l'innovation dans tous les domaines que nous couvrons. Nous offrons des outils et des ressources qui permettent à chacun de repousser les limites de ce qui est possible et de créer des projets uniques.</li>
      <li><strong>Accessibilité et inclusivité :</strong> Nous nous engageons à rendre notre plateforme accessible à tous, quels que soient l’âge, le niveau d'expérience ou les moyens financiers. Nous croyons que tout le monde mérite la possibilité d’apprendre et de réussir.</li>
      <li><strong>Collaboration et soutien :</strong> Nous valorisons l’entraide et la collaboration. Notre objectif est de bâtir une communauté soudée où chaque membre peut apprendre des autres, partager ses idées et se soutenir mutuellement dans ses projets.</li>
    </ul>
    <p>
      Notre équipe travaille sans relâche pour faire de Devinsto.com une plateforme où les utilisateurs se sentent inspirés, motivés et prêts à passer à l’action.
    </p>

    <hr class="my-6" />

    <h2 class="text-3xl font-bold mb-4">Carrières chez Devinsto.com</h2>
    <p class="mb-4">
      Nous sommes toujours à la recherche de talents passionnés pour rejoindre notre équipe et contribuer à l’évolution de Devinsto.com. Si vous êtes un(e) professionnel(le) du développement, du design, du marketing ou de l’éducation, et que vous avez envie de travailler dans une entreprise innovante qui valorise la créativité et l'apprentissage, nous serions ravis de vous rencontrer.
    </p>
    <h3 class="text-2xl font-semibold mb-2">Pourquoi rejoindre Devinsto.com ?</h3>
    <ul class="list-disc pl-6 mb-4">
      <li><strong>Impact :</strong> En rejoignant notre équipe, vous aurez l’opportunité d’avoir un impact direct sur la façon dont les gens apprennent, créent et collaborent dans le domaine du numérique.</li>
      <li><strong>Environnement de travail collaboratif :</strong> Chez Devinsto, nous croyons en la force du travail d’équipe et de l’échange d’idées. Vous serez entouré(e) de personnes passionnées, prêtes à partager leurs connaissances et à vous soutenir.</li>
      <li><strong>Opportunités de croissance professionnelle :</strong> Nous offrons un environnement propice à l’apprentissage continu et à l’évolution professionnelle. Vous aurez la possibilité d’acquérir de nouvelles compétences et d’évoluer avec nous au fur et à mesure de la croissance de la plateforme.</li>
    </ul>
    <h3 class="text-2xl font-semibold mb-2">Postes actuellement disponibles :</h3>
    <ul class="list-disc pl-6">
      <li>Développeur(se) Full-stack</li>
      <li>Designer graphique UX/UI</li>
      <li>Responsable marketing digital</li>
      <li>Formateur(trice) spécialisé(e) en développement web ou mobile</li>
      <li>Community manager</li>
      <li>Chargé(e) de la relation client</li>
    </ul>
    <p class="mt-4">
      Si vous êtes intéressé(e) par l'un de ces postes ou si vous avez une expertise dans un domaine en lien avec notre mission, envoyez-nous votre CV et lettre de motivation à [adresse e-mail] ou postulez directement via notre site web.
    </p>
  </div>
</template>

<style scoped>
.about-container {
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s, color 0.3s;
}

.about-container.light {
  background-color: #f9f9f9; /* Couleur de fond clair */
  color: #333; /* Couleur du texte sombre */
}

.about-container.dark {
  background-color: #1a1a1a; /* Couleur de fond sombre */
  color: #f9f9f9; /* Couleur du texte clair */
}

hr {
  border: 1px solid #ddd; /* Style de séparation */
}
</style>
