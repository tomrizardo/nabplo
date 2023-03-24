<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 text-white text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border border-white rounded-md fontcolor hover:bg-blue-600 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray">
        <slot />
    </button>
</template>
