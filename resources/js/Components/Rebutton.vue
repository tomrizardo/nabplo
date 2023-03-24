<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-600 border border-none rounded-md hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">
        <slot />
    </button>
</template>
