<template>
  <div class="min-h-screen ">
    <div class="text-4xl font-bold p-10 text-gray-700 min-h-[23rem]">
        Welcome, 
        <span>
          {{$page.props.auth.user.first_name}}  {{$page.props.auth.user.last_name}} 
        </span>
    </div>
    <div class="w-full  h-full rounded-md">
    <img :src="$page.props.base_url + `public/img/logo/dsdh.png`"
    alt="" class="mx-auto">

    </div>
    <div>
      
    </div>
  </div>
</template>

<script>
import GuestLayout from "@/Layouts/AuthenticatedLayout.vue"
export default {
layout:GuestLayout,
}
</script>

<style>

</style>