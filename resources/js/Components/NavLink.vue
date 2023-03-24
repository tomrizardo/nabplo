<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'inline-flex items-center px-2 pt-0 border-b-2 border-white text-sm font-medium leading-5 text-white focus:outline-none focus:border-white transition  duration-150 ease-in-out'
    : 'inline-flex items-center px-2 pt-0 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-400 hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
