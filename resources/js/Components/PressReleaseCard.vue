<template>
  <div class="overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="min-h-[40rem] md:h-auto md:w-full bg-cover bg-center" :style="{ 'background-image': `url(${imageUrl})` }"></div>
    <div class="p-4 md:p-5">
      <h2 class="text-lg font-bold text-gray-800">{{ title }}</h2>
      <h2 class="font-semibold text-gray-700 text-md">{{ subtitle }}</h2>
      <p class="mb-4 text-sm text-gray-700">{{ date }}</p>
      <p class="text-sm text-gray-700">{{ description }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    subtitle: String,
    date: String,
    description: String,
    imageUrl: String,
  },
};
</script>