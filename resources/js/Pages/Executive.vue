<template>
  <Head title="President" />

  <GuestLayout>
 <div class="w-screen px-6 mt-16 ">
      <div class="grid grid-cols-1 gap-6 mx-auto md:grid-cols-2 lg:grid-cols-4">
        <div v-for="(executive, index) in executives" :key="index" class="overflow-hidden rounded-lg shadow-lg">
          <div class="relative">
            <img :src="executive.signature_data_uri" alt="Executive" class="object-cover w-full h-[25rem]" />
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="absolute bottom-0 left-0 right-0 flex items-center justify-center">
              <div class="text-center text-white">
                <h2 class="text-2xl font-bold">{{executive.prefix}} {{ executive.name }}</h2>
                <h3 class="text-lg font-semibold">{{ executive.position }}</h3>
                <p class="mt-2 text-sm text-gray-300">Executive Committee Officer, 2022-2025</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
 
  </GuestLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/Guest.vue'

export default {
  props:{
 executives:{type: Array, default: () => null },

  },
  components:{
    Head,
    GuestLayout,
  },
  data(){
    return{
      // bgImageUrl: `${this.$page.props.base_url}img/logo/amt.png`,

      // executives: [
      //   {
      //     name: 'Emily Wilson',
      //     position: 'Chairperson',
      //     bgImageUrl: 'https://source.unsplash.com/random/800x600/?business,professional',
      //     description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique sem vel felis aliquam rhoncus. Nam non efficitur mi, vitae blandit sapien. Fusce commodo diam sit amet commodo pellentesque.',
      //   },
      //   {
      //     name: 'Atty. Melanie T. Soriano-Malaya',
      //     position: 'President',
      //     bgImageUrl: `${this.$page.props.base_url}img/logo/amt.png`,
      //     description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique sem vel felis aliquam rhoncus. Nam non efficitur mi, vitae blandit sapien. Fusce commodo diam sit amet commodo pellentesque.',
      //   },
      //   {
      //     name: 'Gretha Wilson',
      //     position: 'Vice President',
      //     bgImageUrl: 'https://source.unsplash.com/random/800x600/?professional',
      //     description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique sem vel felis aliquam rhoncus. Nam non efficitur mi, vitae blandit sapien. Fusce commodo diam sit amet commodo pellentesque.',
      //   },
      //   {
      //     name: 'Emily Wilson',
      //     position: 'Chairperson',
      //     bgImageUrl: 'https://source.unsplash.com/random/800x600/?business',
      //     description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique sem vel felis aliquam rhoncus. Nam non efficitur mi, vitae blandit sapien. Fusce commodo diam sit amet commodo pellentesque.',
      //   },
      // ],
    
    }
  },
}
</script>

<style scoped>
  .animate {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.5s ease, transform 0.5s ease;
  }

  .animate.visible {
    opacity: 1;
    transform: translateY(0);
  }

  .first {
    animation: 1.6s ease-out 0s 1 slideInFromLeft;
  }

  .second {
    animation: 2s ease-out 0s 1 slideInFromRight;
  }

  .third {
    animation: 2s ease-out 0s 1 slideInFromBottom;
  }

  @keyframes slideInFromRight {
    0% {
        transform: translateX(10%);
        opacity: 0;
    }
    25% {
        opacity: 0;
    }
    75% {
        opacity: 1;
    }
    100% {
        transform: translateX(0);
     
    }
}
@keyframes slideInFromBottom {
    0% {
        transform: translateY(-10%);
        opacity: 0;
    }
    25% {
        opacity: 0;
    }
    75% {
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}
@keyframes slideInFromLeft {
    0% {
        transform: translateX(-4%);
        opacity: 0;
    }
    25% {
        transform: translateX(-4%);
        opacity: 0;
    }

    75% {
        opacity: 1;
    }

    100% {
        transform: translateX(0);
    }
}

  .h-96 {
    height: 24rem;
  }

  @media (min-width: 1024px) {
    .h-96 {
      height: 60rem;
    }
  }
</style>
