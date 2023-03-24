<template>
<RegLayout>
  <div class="min-h-[50rem] mt-20 text-center w-screen">
    <h1 class="text-2xl text-red-500"> {{title }}</h1>
    <div>{{ description }}</div>
  </div>

  </RegLayout>
</template>

<script>
import RegLayout from '@/Layouts/Guest.vue';
export default {
    components:{
        RegLayout
    },
  props: {
    status: Number,
  },
  computed: {
    title() {
      return {
        503: '503: Service Unavailable',
        500: '500: Server Error',
        404: '404: Page Not Found',
        403: '403: Forbidden',
      }[this.status]
    },
    description() {
      return {
        503: 'Sorry, we are doing some maintenance. Please check back soon.',
        500: 'Whoops, something went wrong on our servers.',
        404: 'Sorry, the page you are looking for could not be found.',
        403: 'Sorry, you are forbidden from accessing this page.',
      }[this.status]
    },
  },
}
</script>