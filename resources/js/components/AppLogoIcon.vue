<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <div class="svgBox">
        <svg width="96.427" height="77.88" viewBox="0 0 96.427 77.88" class="static">
            <defs>
                <linearGradient id="rosto">
                    <stop offset="0%" stop-color="#d2305c" />
                    <stop offset="25%" stop-color="#ff5e00" />
                    <stop offset="50%" stop-color="#ffeb00" />
                    <stop offset="75%" stop-color="#00c06b" />
                    <stop offset="100%" stop-color="#00c06b" />
                </linearGradient>
            </defs>
            <g id="Groupe_17" data-name="Groupe 17">
                <path
                    class="dark:stroke-cyan-500"
                    d="M16.114,73.261c32.627-3.8,8.355-55.2,32.712-65.018,15.829-6.383,27.6,3.977,32.915,9.854,4.978,5.587,21.029,40.331-16.254,53.944C28.374,79.95,27.188,50.2,11.746,55.585c-6.12,3.369-8.772,11.352-4.368,16.458,3.556,1.93,6.154,1.52,8.737,1.219"
                    fill="none"
                />
            </g>
        </svg>

        <svg width="96.427" height="77.88" viewBox="0 0 96.427 77.88" class="blur">
            <defs>
                <linearGradient id="rosto">
                    <stop offset="0%" stop-color="#d2305c" />
                    <stop offset="25%" stop-color="#ff5e00" />
                    <stop offset="50%" stop-color="#ffeb00" />
                    <stop offset="75%" stop-color="#00c06b" />
                    <stop offset="100%" stop-color="#00c06b" />
                </linearGradient>
            </defs>
            <g id="Groupe_17" data-name="Groupe 17">
                <path
                    d="M16.114,73.261c32.627-3.8,8.355-55.2,32.712-65.018,15.829-6.383,27.6,3.977,32.915,9.854,4.978,5.587,21.029,40.331-16.254,53.944C28.374,79.95,27.188,50.2,11.746,55.585c-6.12,3.369-8.772,11.352-4.368,16.458,3.556,1.93,6.154,1.52,8.737,1.219"
                    fill="none"
                />
            </g>
        </svg>

        <svg width="96.427" height="77.88" viewBox="0 0 96.427 77.88">
            <defs>
                <linearGradient id="rosto">
                    <stop offset="0%" stop-color="#d2305c" />
                    <stop offset="25%" stop-color="#ff5e00" />
                    <stop offset="50%" stop-color="#ffeb00" />
                    <stop offset="75%" stop-color="#00c06b" />
                    <stop offset="100%" stop-color="#00c06b" />
                </linearGradient>
            </defs>
            <g id="Groupe_17" data-name="Groupe 17">
                <path
                    d="M16.114,73.261c32.627-3.8,8.355-55.2,32.712-65.018,15.829-6.383,27.6,3.977,32.915,9.854,4.978,5.587,21.029,40.331-16.254,53.944C28.374,79.95,27.188,50.2,11.746,55.585c-6.12,3.369-8.772,11.352-4.368,16.458,3.556,1.93,6.154,1.52,8.737,1.219"
                    fill="none"
                />
            </g>
        </svg>
    </div>
</template>

<style>
.svgBox {
    /* padding-top: 100%; */
    position: relative;
    width: 200px;
    height: 200px;
}

.svgBox svg {
    position: absolute;
    width: 96.427px;
    height: 77.88px;
}
.svgBox svg path {
    fill: none;
    stroke: url(#rosto);
    stroke-width: 9;
    stroke-linecap: round;
    stroke-dasharray: 43 220;
    stroke-dashoffset: 0;
    transform: scale(0.9);
    will-change: stroke-dashoffset, transform;
    animation: draw 4s linear infinite;
}

@keyframes draw {
    from {
        stroke-dashoffset: 0;
    }
    to {
        stroke-dashoffset: 255;
    }
}

.svgBox svg.static path {
    animation: none;
    stroke: #252a25;
    /* stroke: #ffffff; */
    stroke-dasharray: none;
}

.svgBox svg.blur path {
    filter: blur(1px);
}
</style>
