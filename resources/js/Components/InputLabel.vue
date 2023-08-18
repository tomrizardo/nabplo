<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block mt-3 text-sm font-semibold text-gray-700 md:text-md md:mt-0">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
