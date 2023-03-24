<template>
    <Head title="Resources" />

    <GuestLayout>
      <div class="w-screen">
    <div class="mt-20 mb-6 text-2xl font-bold text-center text-blue-500 sm:text-4xl">
    5th NABPLO Conference Presentations
    </div>


 
        <div class="items-start justify-center block mt-10 sm:flex sm:mt-20">
   
<div class="flex flex-col items-start justify-between p-6 text-xl font-semibold text-left ">
<div class="text-3xl font-bold text-blue-500">
 Download Resources
  </div>
  <div class="mt-6 text-gray-700">
You can download important resources here</div>
  </div>
    
         <div class="min-h-sceenn sm:min-h-[40rem] max-w-[50rem] sm:mx-auto  sm:p-0 p-1 mx-3">
            <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/pdf/ReengineeringManual.pdf`"  target="_blank" class="text-blue-500 underline text-md">Manual for the Reenginering of BPLO</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/pdf/Provisional-Program.pdf`"  target="_blank" class="text-blue-500 underline text-md">Provisional Program</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/DICT.pdf`"  target="_blank" class="text-blue-500 underline text-md">DICT DAY 1</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/DILG-EODB.pdf`"  target="_blank" class="text-blue-500 underline text-md">DILG-EODB DAY 1</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/OMB.pdf`"  target="_blank" class="text-blue-500 underline text-md">OMB DAY 1</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/QC-LGU.pdf`"  target="_blank" class="text-blue-500 underline text-md">QC-LGU DAY 1</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/CSC.pdf`"  target="_blank" class="text-blue-500 underline text-md">CSC DAY 1</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/ARTA.pdf`"  target="_blank" class="text-blue-500 underline text-md">ARTA DAY 2</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/BFP.pdf`"  target="_blank" class="text-blue-500 underline text-md">BFP DAY 2</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/DILG-BARANGAY.pdf`"  target="_blank" class="text-blue-500 underline text-md">DILG-BARANGAY DAY 2</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/DILG-DAY2.pdf`"  target="_blank" class="text-blue-500 underline text-md">DILG DAY 2</a></li>
      <li class="mt-6 text-2xl font-bold"><a :href="$page.props.base_url + `/assets/events/Maya.pdf`"  target="_blank" class="text-blue-500 underline text-md">MAYA DAY 2</a></li>
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