<template>
    <Head title="Resources" />

    <GuestLayout>
      <div class="w-screen">
    <div class="mt-6 mb-6 text-2xl font-bold text-center text-blue-500 sm:text-4xl">
  
    </div>


 <div class="items-start justify-center block mt-10 sm:flex sm:mt-20">
    
  <div class="flex flex-col items-start justify-between p-6 text-xl font-semibold text-left ">
  
    <div class="text-3xl font-bold text-blue-500">
      Download Resources
    </div>
    <div class="mt-6 text-gray-700">
        
      You can download important resources here
    </div>
  </div>
  <div class="min-h-sceenn sm:min-h-[40rem] max-w-[50rem] sm:mx-auto sm:p-0 p-1 mx-3">
      <div class="mt-4 mb-6 text-3xl font-bold text-blues">
        5th NABPLO Presentations
    </div>
    <a :href="$page.props.base_url + `/assets/pdf/NABPLO_Conference_Resources.zip`" target="_blank" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
      Download All Resources (ZIP)
    </a>
  </div>
</div>

    </div>  
    
    

          
    </GuestLayout>
</template>
<script>

import VLazyImage from "v-lazy-image";
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import GuestLayout from '@/Layouts/Guest.vue'

export default {
    props:{},
    components:{
        Carousel,
        Slide,
        VLazyImage,
        Pagination,Navigation,
GuestLayout,
    },
    data(){
    return{
        slides: 7,
      
    }
    },


     methods: {
  
}
}
</script>

<style>




</style>