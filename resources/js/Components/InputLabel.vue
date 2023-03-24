<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-semibold text-gray-700 text-md">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
