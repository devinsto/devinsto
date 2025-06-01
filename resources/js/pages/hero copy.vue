<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { onMounted, ref } from "vue";

const flipContainer = ref<HTMLElement | null>(null);
const isFlipped = ref(false);

// Rotating The Card Based On The Mouse Movement
const handleMouseMove = (event: MouseEvent) => {
  if (!flipContainer.value) return;
  const rect = flipContainer.value.getBoundingClientRect();
  const mouseX = event.clientX - rect.left;
  const mouseY = event.clientY - rect.top;
  const rotateX = (mouseY / rect.height - 0.5) * 50;
  const rotateY = -(mouseX / rect.width - 0.5) * 50;
  flipContainer.value.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
};

// Resetting The Rotation Back To Original State
const resetRotation = () => {
  if (!flipContainer.value) return;
  flipContainer.value.style.transform = "";
};

// Checking The Value Of isFlipped & Changing its Value
const handleFlip = () => {
  if (!flipContainer.value) return;
  if (isFlipped.value) {
    flipContainer.value.classList.remove("is-flipped");
    isFlipped.value = false;
  } else {
    flipContainer.value.classList.add("is-flipped");
    isFlipped.value = true;
  }
};

// Triggering handleFlip Function on pressing 'Enter' Key
const handleKeyDown = (event: KeyboardEvent) => {
  if (event.key === "Enter") {
    handleFlip();
  }
};

// Pour l'accessibilité, focus automatique sur la carte au montage
onMounted(() => {
  flipContainer.value?.focus();
});
</script>

<template>
  <NavBar />
  <div
    class="flex h-screen flex-col items-center justify-center rounded-lg px-5 py-12 xl:px-10 xl:py-28 dark:bg-slate-900"
  >
    <!-- Image Container -->
    <figure
      ref="flipContainer"
      @mousemove="handleMouseMove"
      @mouseleave="resetRotation"
      @keydown="handleKeyDown"
      tabindex="0"
      class="flip-container relative h-96 w-64 cursor-pointer rounded-3xl"
    >
      <!-- Front Side Of Card -->
      <div
        class="flip-card-front absolute left-0 top-0 flex h-full w-full items-center justify-center rounded-3xl bg-[url('https://images.unsplash.com/photo-1647584959923-b0766bab2a2f?q=80&w=600')] bg-cover bg-center transition-all duration-1000 ease-in-out"
      />
      <!-- Back Side Of Card -->
      <figcaption
        class="flip-card-back absolute left-0 top-0 flex h-full w-full flex-col items-center justify-center gap-3 rounded-3xl bg-black p-4 text-white transition-all duration-1000 ease-in-out"
      >
        <h2 class="mb-2 text-2xl font-bold">Orange</h2>
        <img
          src="https://images.unsplash.com/photo-1608447779172-bcf64548de5c?q=80&w=600"
          alt="Bald Eagle Portrait"
          class="size-24 rounded-full object-cover"
        />
        <h3 class="font-semibold">Fresh, Juicy, and Zesty.</h3>
        <div class="grid grid-cols-1 grid-rows-3 gap-2 text-nowrap text-sm">
          <div class="rounded-full bg-amber-500 px-4 py-2 text-center font-semibold text-black">
            Rich in Vitamin C
          </div>
          <div class="rounded-full bg-amber-500 px-4 py-2 text-center font-semibold text-black">
            Naturally Sweet
          </div>
          <div class="rounded-full bg-amber-500 px-4 py-2 text-center font-semibold text-black">
            Bursting with Flavor
          </div>
        </div>
      </figcaption>
    </figure>
  </div>
</template>

<style scoped>
.flip-container {
  perspective: 1000px;
  transform-style: preserve-3d;
  transition: transform 0.5s ease;
}
.flip-card-front,
.flip-card-back {
  backface-visibility: hidden;
  box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
  transform-style: preserve-3d;
}
.flip-card-back {
  transform: rotateY(180deg);
}
.flip-container:hover .flip-card-front {
  transform: rotateY(180deg);
}
.flip-container:hover .flip-card-back {
  transform: rotateY(360deg);
}
.flip-container.is-flipped .flip-card-front {
  transform: rotateY(180deg);
}
.flip-container.is-flipped .flip-card-back {
  transform: rotateY(360deg);
}
.flip-container .flip-card-back h2 {
  transform: translateZ(40px);
}
.flip-container .flip-card-back img {
  transform: translateZ(50px);
}
.flip-container .flip-card-back h3 {
  transform: translateZ(40px);
}
.flip-container .flip-card-back div {
  transform: translateZ(30px);
}
</style>

