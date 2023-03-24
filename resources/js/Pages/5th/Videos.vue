<template>
    <Head title="Videos" />

    <GuestLayout>
      <div class="w-screen">
   
    <div class="mt-20 mb-6 text-2xl font-bold text-center text-blue-500 sm:text-4xl">
     5th NABPLO Conference Videos
    </div>
 
 

   
   <div class="items-start justify-center block mt-10 sm:flex sm:mt-20">
   
<div class="flex flex-col items-start justify-between p-6 text-xl font-semibold text-left ">
<div class="text-3xl font-bold text-blue-500">
  Sneak Peak
  </div>
  <div class="mt-6 text-gray-700">
You can watch the  5th NABPLO SDE video here</div>
  </div>
    
         <div class="min-h-[20rem] sm:min-h-[40rem] max-w-[50rem] sm:mx-auto  sm:p-0 p-1 mx-3">
  <video autoplay muted controls  playsinline  class="p-1 bg-blue-500 rounded-lg" >
     <source :src="$page.props.base_url + 'assets/videos/Video.mp4'">
        
        
    </video>

</div>
</div>

<hr class="mx-auto mt-6 mb-7 border-gray-300 border-1 max-w-[90vw]" >
   
   <div class="items-start justify-center block mt-10 sm:flex sm:mt-20">
   
<div class="flex flex-col items-start justify-between p-6 text-xl font-semibold text-left ">
<div class="text-3xl font-bold text-blue-500">
  Sneak Peak
  </div>
  <div class="mt-6 text-gray-700">
You can watch the  5th NABPLO SDE photo video here</div>
  </div>
    
         <div class="min-h-[20rem] sm:min-h-[40rem] max-w-[50rem] sm:mx-auto  sm:p-0 p-1 mx-3">
 
  <div>
      <video  muted controls  playsinline  class="p-1 bg-blue-500 rounded-lg" >
     <source :src="$page.props.base_url + 'assets/videos/Photo.mp4'">
        </video>
  </div>
</div>
</div>
</div>




      
      
    

          
    </GuestLayout>
</template>
<script>


import GuestLayout from '@/Layouts/Guest.vue'

export default {
    props:{},
    components:{
    
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