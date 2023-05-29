<template>
    <Head title="Articles" />


       <div class="">
    <div class="flex flex-col h-screen space-y-12">
      <h1 class="mb-6 ml-16 text-4xl font-bold text-blue-500 text-start mt-14"></h1>
      <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
        <div v-for="(cardDat, index) in cardData" :key="index" class="p-2">
          <div class="h-full overflow-hidden rounded-lg shadow-lg">
            <div class="bg-gray-300 bg-center bg-cover h-72" :style="{ backgroundImage: `url(${cardDat.image})` }"></div>
            <div class="h-full p-4">
              <h2 class="mb-2 text-lg font-bold">{{ cardDat.title }}</h2>
              <h2 class="mb-2 text-sm text-gray-500">{{ cardDat.site_name }}</h2>
              <p class="mb-4 text-sm text-gray-700">{{ cardDat.description }}</p>
              <a :href="cardDat.url" target="_blank" class="block mt-2 text-sm text-blue-600 hover:underline">{{ cardDat.url }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import axios from 'axios';


import {Head } from '@inertiajs/inertia-vue3';
export default {
    props:{},
    components:{
Head
    },


    data() {
    return {
             url: ['https://mb.com.ph/2022/11/29/paranaques-bplo-chief-reelected-president-of-business-permit-officials-body/','https://manilastandard.net/lgu/ncr/312146/lawyer-malaya-reelected-as-nabplo-prexy.html','https://smninewschannel.com/malaya-muling-hinirang-bilang-pangulo-ng-nabplo/'],
      cardData: [],
      pressReleases: [
        {
          title: 'Acme Corporation Releases New Product',
          preview: 'Acme Corporation is proud to announce the release of our newest product, the Widget X. With its innovative design and cutting-edge technology, the Widget X is sure to revolutionize the industry.',
          image: 'https://source.unsplash.com/random/800x600/?product',
          link: '#'
        },
        {
          title: 'Acme Corporation Partners with XYZ Company',
          preview: 'Acme Corporation is excited to announce our partnership with XYZ Company. This collaboration will allow us to expand our reach and provide our customers with even more high-quality products and services.',
          image: 'https://source.unsplash.com/random/800x600/?partnership',
          link: '#'
        },
        {
          title: 'Acme Corporation Receives Industry Award',
          preview: 'Acme Corporation is proud to have been awarded the Best New Product award at the annual industry conference. This award is a testament to our commitment to innovation and excellence.',
          image: 'https://source.unsplash.com/random/800x600/?award',
          link: '#'
        },
        {
          title: 'Acme Corporation Announces Expansion',
          preview: 'Acme Corporation is excited to announce our expansion into new markets. With our state-of-the-art facilities and talented team, we are confident that we will continue to grow and succeed.',
          image: 'https://source.unsplash.com/random/800x600/?expansion',
          link: '#'
        }
      ]
    }
  },



   mounted() {
    this.getCardData(this.url);
  },
  methods: {
    getCardData(url) {
           const apiUrl = 'https://opengraph.io/api/1.1/site';
      const appId = '26a86dcb-c25d-4605-8f42-c968e357b02d';
     const requests = url.map(url => axios.get(`${apiUrl}/${encodeURIComponent(url)}?app_id=${appId}`));
      axios.all(requests)
        .then(responses => {
        this.cardData = responses.map(response => response.data.hybridGraph);
        })
        .catch(error => {
          console.log(error);
        });
    },
  }
}
   

</script>
<style>



</style>