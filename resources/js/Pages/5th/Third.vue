<template>
    <Head title="Day 3" />

    <GuestLayout>
      <div class="w-screen">
   
    <div class="mt-20 mb-6 text-2xl font-bold text-center text-blue-500 sm:text-4xl">
     5th NABPLO Day 3 Conference Showcase
    </div>
    <!-- <img :src="$page.props.base_url + 'assets/www.png'" alt="" class="object-contain w-full sm:block"> -->
  
    
        <div class="mx-auto max-w-[90rem] container ">
           <div class="mb-10">
       <Carousel   :wrap-around="true"   pauseAutoplayOnHover  :autoplay="3500" :transition="1500" class="max-h-full">
       
     <Slide v-for="n in 246" :key="n" class="">
    <div class=" carousel__item">
      <VLazyImage :src="$page.props.base_url + `/assets/third/nab (${n}).jpg` " class="max-h-[40rem]  rounded-lg  p-1"/>
   
      </div>
      </Slide>
 <template #addons>
      <Navigation />
   
    </template>
 
  </Carousel>
   
      


    </div>
 <hr class="mx-auto mt-6 mb-7 border-gray-300 border-1 max-w-[90vw]" >
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-4">

   <div class="col-span-1" v-for="n in 246" :key="n">
 <VLazyImage :src="$page.props.base_url + `/assets/third/nab (${n}).jpg` " class=" sm:max-h-[20rem]  rounded-lg  p-3 sm:p-1"/>
   </div>

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



.carousel__item {
  min-height: 200px;
border: 2px 2px 2px 2px;
  border-color: blue;
  color: var(--vc-clr-white);
  font-size: 100px;
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel__slide {
  padding: 10px;
}

.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid transparent;
}

.carousel__icon{
  height: 5em;
}

.v-lazy-image {
  filter: blur(5px);
  transition: filter 1.6s;
  will-change: filter;
}
.v-lazy-image-loaded {
  filter: blur(0);
}

</style>