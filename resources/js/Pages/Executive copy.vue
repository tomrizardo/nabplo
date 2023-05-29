<template>
  <Head title="President" />

  <GuestLayout>
    <div class="flex flex-col items-center justify-center w-screen bg-gray-100 lg:max-h-screen lg:mt-6">

      <!-- Profile -->
      <div class="w-full overflow-hidden bg-white shadow-lg lg:rounded-lg">
        <div class="flex flex-col lg:flex-row ">
          <!-- Image -->
          <div class="w-full bg-center bg-cover lg:w-1/2 h-96 first" :style="{ 'background-image': `url(${bgImageUrl})` }">
            <div class="flex items-center justify-center h-full px-4 py-8 bg-gray-900 bg-opacity-50">
         
            </div>
          </div>

          <!-- Details -->
          <div class="z-40 flex flex-col items-start justify-center w-full px-6 py-8 -mt-8 bg-white lg:z-0 lg:w-1/2 lg:px-8 lg:mt-0 second">
            <h1 class="mb-2 text-4xl font-bold text-gray-900">Atty. Melanie T. Soriano-Malaya</h1>
            <div class="flex items-center justify-between w-full mb-4 ">
                   <h3 class="mb-2 text-xl font-semibold">
                NABPLO President 
            </h3>
            <span>S.Y: 2022-2025 </span> 
            </div>
         
            <p class="mb-2 text-xl font-semibold text-gray-900">Bio</p>
            <p class="mb-6 text-lg text-gray-700">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis dolor euismod, luctus felis eu, molestie felis.
              Fusce vel enim semper, efficitur arcu sed, auctor enim. Nullam volutpat, ex sit amet auctor tincidunt, est leo
              volutpat quam, eget tristique dolor nibh eu dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
              posuere cubilia curae; Sed et finibus lorem. Nullam pharetra lorem id nibh eleifend, vel bibendum libero suscipit.
              Maecenas ullamcorper rutrum mauris, sit amet dapibus elit pretium ut. Duis tincidunt pharetra sem, nec auctor turpis
              gravida vitae.
            </p>
            <div class="w-full h-px mb-6 bg-gray-300"></div>
            <p class="mb-2 text-xl font-semibold text-gray-900">Achievements and Awards</p>
            <ul class="mb-6 text-lg text-gray-700 list-disc list-inside">
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
              <li>Duis quis dolor euismod, luctus felis eu, molestie felis.</li>
              <li>Fusce vel enim semper, efficitur arcu sed, auctor enim.</li>
              <li>Nullam volutpat, ex sit amet auctor tincidunt, est leo volutpat quam, eget tristique augue velit non mi.</li>
<li>Curabitur pharetra, felis id molestie rutrum, mauris nulla dapibus purus, vel ullamcorper augue mauris sed odio.</li>
<li>Suspendisse vel augue blandit, consectetur lacus vitae, tristique erat.</li>
<li>Quisque vel tellus nec neque ultrices rhoncus.</li>
<li>Maecenas vel mauris eu purus consequat faucibus.</li>
<li>Donec in elit in metus efficitur convallis.</li>
</ul>
          <div class="w-full h-px mb-6 bg-gray-300"></div>
            <p class="mb-2 text-xl font-semibold text-gray-900">Contact</p>
            <ul class="text-lg text-gray-700 list-disc list-inside">
              <li>Email: chiefname@example.com</li>
              <li>Phone: 123-456-7890</li>
              <li>Address: 1234 Main St, Anytown USA</li>
            </ul>
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
  props:{},
  components:{
    Head,
    GuestLayout,
  },
  data(){
    return{
      bgImageUrl: `${this.$page.props.base_url}img/logo/amt.png`,
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
