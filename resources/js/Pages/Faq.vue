<template>
    <Head title="Resources" />

    <GuestLayout>
      <div class="w-screen">
   
    <div class="mt-20 mb-6 text-2xl font-bold text-center text-blue-500 sm:text-4xl">
     NABPLO Conference Showcase
    </div>
    <!-- <img :src="$page.props.base_url + 'assets/www.png'" alt="" class="object-contain w-full sm:block"> -->
  
    
        <div class="mx-auto max-w-[90rem] container ">
           <div class="mb-10">
       <Carousel   :wrap-around="true"   pauseAutoplayOnHover  :autoplay="3500" :transition="1000" class="max-h-full">
       
     <Slide v-for="n in 64" :key="n" class="">
    <div class=" carousel__item">
      <img :src="$page.props.base_url + `/assets/nab/nab (${n}).jpg` " class="max-h-[40rem]  rounded-lg bg-blue-500 p-1">
   
      </div>
      </Slide>
 <template #addons>
      <Navigation />
     
    </template>
 
  </Carousel>
   
      


    </div>
 <hr class="mx-auto mt-6 mb-7 border-gray-300 border-1 max-w-[90vw]" >
    <div class="items-start justify-center block mt-10 sm:flex sm:mt-20">
   
<div class="flex flex-col items-start justify-between p-6 text-xl font-semibold text-left ">
<div class="text-3xl font-bold text-blue-500">
  Sneak Peek
  </div>
  <div class="mt-6 text-gray-700">
You can watch the previous 3rd NABPLO conference here</div>
  </div>
    
         <div class="min-h-sceenn sm:min-h-[40rem] max-w-[50rem] sm:mx-auto  sm:p-0 p-1 mx-3">
  <video   controls    class="p-1 bg-blue-500 rounded-lg" >
        <source :src="$page.props.base_url + 'assets/NABPLO.mp4'">
        
    </video>
</div>
</div>

</div>

      
        </div>
    
 
          
    </GuestLayout>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import GuestLayout from '@/Layouts/Guest.vue'

export default {
    props:{},
    components:{
	Head,
        Carousel,
        Slide,
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