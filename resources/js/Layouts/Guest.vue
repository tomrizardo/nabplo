

<template>
<div class="overflow-hidden">
  <div class="z-10 flex items-center justify-between w-screen p-4 border-none sm:fixed sm:p-0 sm:justify-evenly bg">
          
                      
                            <!-- Logo -->
                            <div class="flex items-center justify-center">
                                <Link :href="route('guest_home')">
                                    <ApplicationLogo class="block w-auto h-12" />
                                </Link>

        </div>

         <div class="flex items-end sm:hidden">
                            <button id="buttonreg" aria-label="Dropdown button" @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 text-white transition duration-150 ease-in-out rounded-md ss hover:text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:text-white">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>

                            </button>
                       
                      
                
                    </div>
                      
                                      <div class="items-center hidden mr-12 space-x-20 sm:ml-2 sm:flex lg:mt-0 md:mt-2 justify-evenly">
                <NavLink :href="route('guest_home')" :active="route().current('guest_home')">
                    Home
                </NavLink>
                <BreezeDropdown align="left" width="56">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center text-sm font-medium text-white transition duration-150 ease-in-out border-b-2 border-transparent leading-2 text hover:text-gray-700 hover:border-white focus:outline-none focus:text-white focus:border-gray-300">
                                               Resources

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>
                                    <template #content>
                                    
                                      
                                        
                                        <div>
                                            <div class="text-sm font-medium text-center text-white bg-blue-500">
                                                5th NABPLO 
                                                </div>     
                                        
                                        <BreezeDropdownLink :href="route('first')"  as="button"  :active="route().current('first')">
                                         Day 1 Gallery
                                 
                                        </BreezeDropdownLink>
    <BreezeDropdownLink :href="route('second')"  as="button"  :active="route().current('second')">
                                         Day 2 Gallery
                                 
                                        </BreezeDropdownLink>
                                            <BreezeDropdownLink :href="route('third')"  as="button"  :active="route().current('third')">
                                         Day 3 Gallery
                                 
                                        </BreezeDropdownLink>
                                                 <BreezeDropdownLink :href="route('videos')"  as="button"  :active="route().current('videos')">
                                       Videos
                                 
                                        </BreezeDropdownLink>

                                           <BreezeDropdownLink :href="route('pdf')"  as="button"  :active="route().current('pdf')">
                                      Downloadable PDF
                                 
                                        </BreezeDropdownLink>
                                        </div>
                                        <div>
                                       <div class="text-sm font-medium text-center text-white bg-blue-500">
                                                3rd NABPLO 
                                                </div>   
                                         <BreezeDropdownLink :href="route('faq')"  :active="route().current('faq')" as="button" >
                                        3rd Nabplo Convention
                                        </BreezeDropdownLink>
                                     
</div>
                                         
                                    </template>
                                </BreezeDropdown>
                         
                  <NavLink :href="route('aboutus')" :active="route().current('aboutus')">
               About Us
                </NavLink>
                     
                   
     <NavLink :href="route('checkstatus')" :active="route().current('checkstatus')">
              Track Status
                </NavLink>

                    
   </div>  
  
    <!-- <div class="hidden sm:flex ">         
      
                <Link :href="route('register')" > 
                        <PrimaryButton class="ml-4 border-white rounded-2xl" >
                 Register
                </PrimaryButton> 
               </Link>
               
                     </div> -->
   
   </div>
    
      <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class=" sm:hidden">
          <div class="z-10 flex flex-col items-end pt-3 pb-1 text-white bg">
                      
                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink class="text" :href="route('guest_home')">
                               Home
                            </BreezeResponsiveNavLink>
                        </div>

                        <!-- <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink class="text" :href="route('register')">
                              Register
                            </BreezeResponsiveNavLink>
                        </div> -->
                      
                        <div class="mt-3 space-y-1">
                                 
                                  
                                 <span class="rounded-md ">
                                     <button @click="isHidden = !isHidden" type="button" class="inline-flex items-center font-medium text-white transition duration-150 ease-in-out border-b-2 border-transparent text-md leading-2 text hover:text-gray-700 hover:border-white focus:outline-none focus:text-white focus:border-gray-300">
                                        Resources

                                         <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                             <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                         </svg>
                                     </button>
                                 </span>
                          
                        
                             <div class="mt-6 text-right " v-if="!isHidden">
                                 <div  class="mt-4 mr-20 font-semibold underline ">
                                     5th NABPLO
                                 </div>
                                     <BreezeDropdownLink :href="route('first')"  as="button"  :active="route().current('first')" class="text-white">
                                  Day 1 Gallery
                          
                                 </BreezeDropdownLink>
                                  <BreezeDropdownLink :href="route('second')"  as="button"  :active="route().current('second')" class="text-white">
                                  Day 2 Gallery
                          
                                 </BreezeDropdownLink>
                                  <BreezeDropdownLink :href="route('third')"  as="button"  :active="route().current('third')" class="text-white">
                                  Day 3 Gallery
                          
                                 </BreezeDropdownLink>
                                      <BreezeDropdownLink :href="route('videos')"  as="button"  :active="route().current('videos')" class="text-white">
                                 Videos
                          
                                 </BreezeDropdownLink>
                                      <BreezeDropdownLink :href="route('pdf')"  as="button"  :active="route().current('pdf')" class="text-white">
                               PDF
                          
                                 </BreezeDropdownLink>

                                     <div  class="mt-3 mr-20 font-semibold underline ">
                                     3rd NABPLO 
                                 </div>

                                          <BreezeDropdownLink :href="route('faq')"  as="button"  :active="route().current('faq')" class="text-white">
                              3rd NABPLO Convention
                          
                                 </BreezeDropdownLink>
                             </div>
                               
                                 
                           
                                  
                    
                    
                 </div>
                     
                          <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink  class="text"  :href="route('aboutus')">
                              About Us
                            </BreezeResponsiveNavLink>
                        </div>
                              <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink  class="text"  :href="route('checkstatus')">
                              Track Status
                            </BreezeResponsiveNavLink>
                        </div>



         
                    </div>
  </div>
        <div class="container w-screen bg-white">
            <slot />
        </div>


     
    


<footer class="p-4 bg-white shadow-md sm:p-6 ">
    <hr class="my-6 fontblue sm:mx-auto dark:border-gray-400 lg:my-8">
    <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <a href="https://nabploph.org/" class="flex items-center">
                <img src="https://nabploph.org/home/public/assets/nabplologo.png" class="h-8 mr-3" alt="NABPLO Logo">
                <span class="self-center mt-1 text-xl font-semibold underline whitespace-nowrap fontblue">NABPLO </span>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-1 sm:gap-6 sm:grid-cols-3">
            <div>
                <h2 class="mb-6 text-sm font-semibold uppercase fontblue dark:text-white">Resources</h2>
                <ul class="text-gray-600 fontblue">
                    <li class="mb-4">
                        <a href="https://nabploph.org/home/Aboutus" class="hover:underline">About Us</a>
                    </li>
                   
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold uppercase fontblue dark:text-white">Follow us</h2>
                <ul class="fontblue dark:text-gray-300">
                    <li class="mb-4">
                        <a href="https://www.facebook.com/NABPLO/" class="hover:underline ">Facebook</a>
                    </li>
                   
                </ul>
            </div>
            <div class="flex flex-col items-center justify-center sm:items-start">
        <h2 class="mb-6 text-sm font-semibold uppercase fontblue">Contact Us</h2>
           <p class="flex items-center justify-center mb-4 mr-3 text-xs fontblue sm:text-sm sm:mr-0 md:justify-start">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
            class="hidden w-4 mr-2 sm:mr-4 sm:block" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
            </path>
          </svg>
         nbplophilippines@gmail.com
        </p>
              <!--  <p class="flex items-center justify-center mb-4 mr-3 text-xs fontblue sm:text-sm sm:mr-0 md:justify-start">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone"
             class="hidden w-4 mr-2 sm:mr-4 sm:block" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
            </path>
          </svg>
          + 01 234 567 88
        </p> -->
         
     
      </div>
        </div>
    </div>
    <!-- <hr class="my-6 fontblue sm:mx-auto dark:border-gray-400 lg:my-8"> -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm fontblue sm:text-center dark:text-gray-300">© 2022 <a href="https://nabploph.org/" class="hover:underline">Nabplo Philippines</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="https://www.facebook.com/NABPLO/" class="fontblue hover:text-gray-900 dark:hover:text-white" target="_blank">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Facebook page</span>
            </a>
      
          
        </div>
    </div>
</footer>

        </div>
</template>
<script>
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from '@/Components/NavLink.vue';
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Head ,Link} from '@inertiajs/inertia-vue3';
export default {
    components: {
        ApplicationLogo,
        PrimaryButton,
        NavLink,Head,Link,BreezeResponsiveNavLink,BreezeDropdownLink,BreezeDropdown
     
    },
    data(){
        return{
            isHidden: true,
              date: new Date().getFullYear(),
               showingNavigationDropdown: false,
               BreezeResponsiveNavLink
        }
    }
}


</script>
<style>
.fontblue{
color:#0065C3;
border-color: #0065C3;
}
.bg{
    background:#0577e2;
}



@media (-webkit-device-pixel-ratio: 1.5) {
:root {
zoom: normal;

}}

</style>