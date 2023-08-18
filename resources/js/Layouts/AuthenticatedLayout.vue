

<template>
<div class="overflow-auto tablet:overflow-y-scroll tablet:h-screen ">

  <div class="z-10 flex items-center justify-between w-screen p-4 border-none sm:p-0 sm:justify-between sm:hidden">
          
                      
                           
                            <div class="flex items-center justify-center ml-6">
                                <Link :href="route('guest_home')">
                                    <ApplicationLogo class="block w-auto h-12 text-white" />
                                </Link>

                            
        </div> 

   <div class="flex items-end sm:hidden ml-[10rem]">
  <button id="buttonreg" aria-label="Dropdown button" @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 text-white transition duration-150 ease-in-out rounded-md bg-blues hover:text-white hover:bg-blue-500 focus:outline-none focus:bg-blues focus:text-white">
    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
      <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
      <path :class="{'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>
</div>

<div class="flex items-center justify-between sm:flex-col sm:w-1/2 lg:mt-0 md:mt-2">
 

  <div :class="{'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown}" class="absolute top-0 left-0 z-50 w-full mt-20 bg-white sm:hidden" >
<div class="flex flex-col items-start p-5  justify-start laptop:min-h-[32rem] desktop:min-h-[45rem]">

      <!-- <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('dashboard') }" ><div>
<svg  width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="dashboard" class="icon glyph" stroke="currentColor" fill="currentColor" > 

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier">

<rect x="2" y="2" width="9" height="11" rx="2"/>

<rect x="13" y="2" width="9" height="7" rx="2"/>

<rect x="2" y="15" width="9" height="7" rx="2"/>

<rect x="13" y="11" width="9" height="11" rx="2"/>

</g>

</svg>
    </div> <Link :href="route('dashboard')" class="ml-1.5"  :active="route().current('dasboard')" >
                               Dashboard
                                </Link>
</div> -->
    <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
            <svg aria-hidden="true"  width="30px" height="22px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div> <Link :href="route('home')" class="ml-1"  :active="route().current('home')" >
                               NABPLO Directory
                                </Link>
</div>
    <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('participants') }" ><div>
            <svg aria-hidden="true"  width="30px" height="22px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div> <Link :href="route('participants')" class="ml-1"  :active="route().current('participants')" >
                              Participants  Directory
                                </Link>
</div>
<!-- <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full " v-if="$page.props.auth.user.roles == '1'"  :class="{ 'rounded-md bg-blues text-white max-w-full': route().current('settings') }"><div>
<svg width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  fill="none" stroke="currentColor">
<path class="a" d="M3,21.016l.78984-2.87249C5.0964,13.3918,8.5482,11.016,12,11.016" /><circle class="b" cx="12" cy="5.98404" r="5"/><circle class="a" cx="17" cy="18" r="5"/><polyline class="a" points="14.872 18.149 16.32 20.082 19.533 16.572"/></svg> 
   </div> <Link :href="route('settings')" class="ml-1"  :active="route().current('settings')" >
                                 User Verificaton
                                </Link>
</div> -->

    <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('logout') }" ><div>
<svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      
    </div> <Link :href="route('logout')" class="ml-1"   method="post" as="button">
                               Logout
                                </Link>
</div>

            </div>
  </div>
</div>
</div>
    <div class="block gap-10 bg-white sm:grid tablet:grid-cols-5 laptop:grid-cols-5 desktop:grid-cols-5">


            <div class=" text-center text-black  min-w-[15rem] laptop:flex flex-col justify-beween fixed z-5 sm:col-span-1 min-h-screen hidden  tablet:hidden   ">
                    <div class="flex items-center justify-start ml-6">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block w-auto h-12" />
                                </Link>
 </div>
<div class="flex flex-col items-start p-5  mt-16 justify-start laptop:min-h-[32rem] desktop:min-h-[45rem]">

      <!-- <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('dashboard') }" ><div>
<svg  width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="dashboard" class="icon glyph" stroke="currentColor" fill="currentColor" > 

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier">

<rect x="2" y="2" width="9" height="11" rx="2"/>

<rect x="13" y="2" width="9" height="7" rx="2"/>

<rect x="2" y="15" width="9" height="7" rx="2"/>

<rect x="13" y="11" width="9" height="11" rx="2"/>

</g>

</svg>
    </div> <Link :href="route('dashboard')" class="ml-1.5"  :active="route().current('dasboard')" >
                               Dashboard
                                </Link>
</div> -->
    <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
            <svg aria-hidden="true"  width="30px" height="22px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div> <Link :href="route('home')" class="ml-1"  :active="route().current('home')" >
                               NABPLO Directory
                                </Link>
</div>

    <div class="flex items-center p-3 text-[0.9em] mt-3 font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('participants') }" ><div>
<svg width="30px" height="30px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" stroke="currentColor">
    

    <g id="web-app" >
        <g id="users">
            <path d="M8,13 C6.34314575,13 5,11.6568542 5,10 C5,8.34314575 6.34314575,7 8,7 C9.65685425,7 11,8.34314575 11,10 C11,11.6568542 9.65685425,13 8,13 Z M16,13 C14.3431458,13 13,11.6568542 13,10 C13,8.34314575 14.3431458,7 16,7 C17.6568542,7 19,8.34314575 19,10 C19,11.6568542 17.6568542,13 16,13 Z M8,15 C10.3893851,15 12.5341111,16.0475098 14,17.7083512 C14,18.1839232 14,18.6144728 14,19 L2,19 C2,18.6144728 2,18.1839232 2,17.7083512 C3.46588891,16.0475098 5.61061495,15 8,15 Z M16,19 L16,16.9519717 L15.4994784,16.3848843 C15.1151403,15.949432 14.6965808,15.550843 14.2491048,15.1921858 C14.8126186,15.0663701 15.3985585,15 16,15 C18.3893851,15 20.5341111,16.0475098 22,17.7083512 L22,19 L16,19 Z" id="Shape">

</path>
        </g>
    </g>
</svg>    </div> <Link :href="route('participants')" class="ml-1"  :active="route().current('participants')" >
                               Participants Directory
                                </Link>
</div>


<!-- <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full " v-if="$page.props.auth.user.roles == '1'"  :class="{ 'rounded-md bg-blues text-white max-w-full': route().current('settings') }"><div>
<svg width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  fill="none" stroke="currentColor">
<path class="a" d="M3,21.016l.78984-2.87249C5.0964,13.3918,8.5482,11.016,12,11.016" /><circle class="b" cx="12" cy="5.98404" r="5"/><circle class="a" cx="17" cy="18" r="5"/><polyline class="a" points="14.872 18.149 16.32 20.082 19.533 16.572"/></svg> 
   </div> <Link :href="route('settings')" class="ml-1"  >
                                 User Verificaton
                                </Link>
</div> -->



            </div>
            <div class="px-3 ml-3 text-start">
    
     <!-- <div class="flex items-center justify-center w-8 h-8 rounded-full bg-greens">

                
        <div class="uppercase">
            {{($page.props.auth.user.first_name).slice(0,1)}}
        </div>

        <div class="uppercase">
            {{($page.props.auth.user.last_name).slice(0,1)}}
        </div>

      
          </div> -->

                <div class="capitalize ">
            <!-- {{$page.props.auth.user.first_name + " "+    $page.props.auth.user.last_name}} -->
        </div>

        <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss">
<svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      
     <Link :href="route('logout')" method="post" as="button" class="ml-1 text-sm text-blues" >
                                    Log out
                                        </Link>
  </div>
            </div>
</div>
    

            
             <div class=" col-span-4 p-3 laptop:col-span-5 desktop:col-span-5 laptop:p-0 desktop:p-0 desktop:ml-[15rem] laptop:ml-[18rem] bg tablet:col-span-5 tablet:p-3 bg " >  
              <div class="hidden w-full p-3 bg sm:block">
              <div class="flex items-center justify-between">
                  <div>
                    
                  </div>

                  <div class="flex items-center mr-1">
                    <div>
                          {{ $page.props.auth.user.email}}
                    </div>
                           <div class="flex items-center justify-center w-8 h-8 ml-2 mr-3 text-center rounded-full " :style="{ backgroundColor: randomColor  }" >
                       <span class="font-medium uppercase text-md " > 
                            {{ $page.props.auth.user.first_name.split(' ')[0][0] }}{{ $page.props.auth.user.last_name.split(' ')[0][0] }}
                       </span>

                       
                  </div>
<!-- 
                                    <div v-else class="flex items-center justify-center w-10 h-10 ml-2 text-center rounded-full " >
               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRna0Yn_AMMEcnVGFuHNG0-UENJAFjsGKO8RQ&usqp=CAU" alt="" class="object-cover w-full h-full rounded-full">

                       
                  </div> -->

                      <div>
                          
                      </div>
                
                  </div>
                </div>  </div><slot /></div>
        </div>


      
    
        </div>
</template>
<script>
import ApplicationLogo from '@/Components/authLogo.vue';
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
           randomColor: '#FFC947',
            showingNavigationDropdown:false,
        }
    },
   methods: {
    closeDropdown() {
      this.showingNavigationDropdown = false;
    },
  },

  created() {
  const colors = ['#FFC947', '#FFB4A2', '#C2E7D9', '#A2D2FF', '#E4B4C2'];
  this.randomColor = colors[Math.floor(Math.random() * colors.length)];
},

}


</script>
<style>
.bgsss{
    background:#0577e2;
}
.bg{
    background:#f7f8f9
}
.bgs{
    background: #fdfdfd;
}
/* 
@media (-webkit-device-pixel-ratio: 1.25) {
:root {
zoom: 1;
}
} */
.fadeInDown {
    animation-duration: 0.5s;
    animation-name: fadeInDown;
  }

  .fadeOutUp {
    animation-duration: 0.5s;
    animation-name: fadeOutUp;
  }

  @keyframes fadeInDown {
    from {
      transform: translate3d(0, -100%, 0);
      opacity: 0;
    }

    to {
      transform: none;
      opacity: 1;
    }
  }

  @keyframes fadeOutUp {
    from {
      transform: none;
      opacity: 1;
    }

    to {
      transform: translate3d(0, -100%, 0);
      opacity: 0
    }
  }

</style>