<template>
    <Head title="Articles" />

    <GuestLayout>
       <div class="">
    <div class="flex flex-col min-h-screen space-y-12">
      <h1 class="mb-6 ml-16 text-4xl font-bold text-blue-500 text-start mt-14 "></h1>
      <div class="grid grid-cols-1 gap-12 md:ml-6 md:grid-cols-3 lg:grid-cols-4">
        <div v-for="(cardDat, index) in urls" :key="index" class="p-2">
          <div class="h-full overflow-hidden rounded-lg shadow-lg">
            <div class="bg-gray-300 bg-center bg-cover h-72" :style="{ backgroundImage: `url(${cardDat.signature_data_uri})` }"></div>
            <div class="h-full p-4">
              <h2 class="mb-2 text-lg font-bold">{{ cardDat.title }}</h2>
              <!-- <h2 class="mb-2 text-sm text-gray-500">{{ cardDat.site_name }}</h2> -->
              <p class="mb-4 text-sm text-gray-700">{{ cardDat.desc }}</p>
              <a :href="cardDat.url" target="_blank" class="block mt-2 text-sm text-blue-600 hover:underline">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </GuestLayout>
</template>
<script>
import axios from 'axios';
import PressReleaseCard from '@/Components/PressReleaseCard'
import GuestLayout from '@/Layouts/Guest.vue'
import {Head } from '@inertiajs/inertia-vue3';
export default {
    props:{        articles: Array,},
    components:{
GuestLayout,Head,PressReleaseCard
    },


    data() {
    return {
             urls: this.articles,
      cardData: [],
  
    }
  },



   mounted() {
    // this.getCardData(this.urls);
  },
  methods: {
  // async getCardData(urls) {
  //   const apiUrl = 'https://opengraph.io/api/1.1/site';
  //   const appId = '89b47343-3cc5-46ea-87d6-ac3d0090c733';

  //   // Check if data exists in local storage
  //   const cachedData = localStorage.getItem('cardData');
  //   if (cachedData) {
  //     this.cardData = JSON.parse(cachedData);
  //     return;
  //   }

  //   const requests = urls.map(url => axios.get(`${apiUrl}/${encodeURIComponent(url.url)}?app_id=${appId}`));

  //   try {
  //     const responses = await Promise.all(requests);
  //     const validResponses = responses.filter(response => response.status === 200);

  //     this.cardData = validResponses.map(response => response.data.hybridGraph);

  //     // Store data in local storage
  //     localStorage.setItem('cardData', JSON.stringify(this.cardData));
  //   } catch (error) {
  //     console.log(error);
  //   }
  // },
  // }
}
}  

</script>
<style>



</style>