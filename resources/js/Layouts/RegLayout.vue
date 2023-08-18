

<template>
<div class="overflow-auto tablet:overflow-y-scroll tablet:h-screen ">

  <div class="fixed z-10 flex items-center justify-between w-screen p-4 border-none sm:p-0 sm:justify-evenly bg">
          
                      
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
                    <NavLink :href="route('faq')" :active="route().current('faq')">
                   Resources
                </NavLink>
               
             
                  <NavLink :href="route('aboutus')" :active="route().current('aboutus')">
               About Us
                </NavLink>
                  <NavLink :href="route('logout')" :active="route().current('logout')">
               Loug Us
                </NavLink>
                     
			<!-- <NavLink :href="route('checkstatus')" :active="route().current('checkstatus')">
              Track Status
                </NavLink>  -->

                    
   </div>  
  
    <div class="hidden sm:flex ">         
      
                <Link :href="route('register')" > 
                        <PrimaryButton class="ml-4 border-white rounded-2xl" >
                 Register
                </PrimaryButton> 
               </Link>
               
                     </div>
   
   </div>
    
      <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
          <div class="flex flex-col items-end pt-20 pb-1 text-white border-t bg">
                      
                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink class="text" :href="route('guest_home')">
                               Home
                            </BreezeResponsiveNavLink>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink class="text" :href="route('register')">
                              Register
                            </BreezeResponsiveNavLink>
                        </div>
                         <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink  class="text"  :href="route('faq')">
                              Resources
                            </BreezeResponsiveNavLink>
                        </div>
                       
                          <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink  class="text"  :href="route('aboutus')">
                              About Us
                            </BreezeResponsiveNavLink>
                        </div>
                            <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink  class="text"  :href="route('logout')">
                              Track Status
                            </BreezeResponsiveNavLink>
                        </div> 


         
                    </div>
  </div>
      
        <div class="overflow-hidden bg-white laptop:overflow-hidden ">
            <slot />
        </div>


      
    
        </div>
</template>
<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Head ,Link} from '@inertiajs/inertia-vue3';
export default {
    components: {
        ApplicationLogo,
        PrimaryButton,
        NavLink,Head,Link,BreezeResponsiveNavLink
     
    },

    data(){
        return{
            showingNavigationDropdown:false,
        }
    }
}


</script>
<style>
.bgs{
    background: rgb(18, 72, 153);
}
.bg{
    background: #0577E2;
}
/* 
@media (-webkit-device-pixel-ratio: 1.25) {
:root {
zoom: 1;
}
} */



</style>