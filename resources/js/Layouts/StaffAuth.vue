

<template>
<div class="overflow-auto tablet:overflow-y-scroll tablet:h-screen ">

  <div class="z-10 flex items-center justify-between w-screen p-4 border-none sm:p-0 sm:justify-between sm:hidden">
          
                      
                           
                            <div class="flex items-center justify-center ml-6">
                                <Link :href="route('dashboard')">
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


  

<div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full "  :class="{ 'rounded-md bg-blues text-white max-w-full': route().current('settings') }"><div>
<svg width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  fill="none" stroke="currentColor">
<path class="a" d="M3,21.016l.78984-2.87249C5.0964,13.3918,8.5482,11.016,12,11.016" /><circle class="b" cx="12" cy="5.98404" r="5"/><circle class="a" cx="17" cy="18" r="5"/><polyline class="a" points="14.872 18.149 16.32 20.082 19.533 16.572"/></svg> 
   </div> <Link :href="route('staff.settings')" class="ml-1"  :active="route().current('settings')" >
                                 User Verificaton
                                </Link>
</div>
  <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
            <svg aria-hidden="true"  width="30px" height="22px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div> <Link :href="route('staff.article')" class="ml-1"  :active="route().current('staff.article')" >
                               Articles
                                </Link>
</div>
 <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
            <svg aria-hidden="true"  width="30px" height="22px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div> <Link :href="route('staff.advisory')" class="ml-1"  :active="route().current('staff.advisory')" >
                               Advisory
                                </Link>
</div>
  <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
<svg fill="none" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="22px" viewBox="0 0 38.907 38.907" xml:space="preserve" stroke="currentColor">

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier"> <g> <path d="M15.611,3.706c0-2.422,1.72-3.706,3.842-3.706s3.842,1.283,3.842,3.706c0,2.421-1.721,5.06-3.842,5.06 C17.33,8.766,15.611,6.127,15.611,3.706z M9.952,7.961c1.885,0,3.412-2.344,3.412-4.494c0-2.15-1.527-3.291-3.412-3.291 c-1.885,0-3.412,1.141-3.412,3.291C6.538,5.617,8.066,7.961,9.952,7.961z M28.951,7.961c1.885,0,3.412-2.344,3.412-4.494 c0-2.15-1.527-3.291-3.412-3.291c-1.886,0-3.412,1.141-3.412,3.291C25.539,5.617,27.065,7.961,28.951,7.961z M34.184,9.425 c-0.28-0.284-0.664-0.443-1.063-0.443h-3.235l-0.564,0.754l1.037,5.88l-1.406,1.325l-1.404-1.325l1.037-5.88L28.02,8.982h-3.231 c-0.019,0-0.035,0.004-0.053,0.005c0.495,0.112,0.959,0.359,1.319,0.725c0.502,0.504,0.785,1.203,0.779,1.917l-0.096,10.529 c-0.012,1.057-0.598,1.941-1.453,2.377v8.199c0,1.104,0.896,2,2,2c0.695,0,1.309-0.357,1.666-0.898 c0.357,0.541,0.971,0.898,1.668,0.898c1.104,0,2-0.896,2-2V21.268c0.129,0.037,0.262,0.063,0.402,0.064 c0.852,0.034,1.506-0.658,1.514-1.486l0.086-9.351C34.623,10.094,34.467,9.71,34.184,9.425z M12.072,22.271l0.001-10.669 c0-1.277,0.897-2.345,2.094-2.617c-0.016,0-0.031-0.004-0.046-0.004h-3.236L10.32,9.735l1.038,5.88L9.952,16.94l-1.406-1.325 l1.038-5.88L9.019,8.981H5.787c-0.828,0-1.5,0.671-1.5,1.5l-0.001,9.476c0,0.828,0.671,1.5,1.5,1.5c0.176,0,0.343-0.036,0.5-0.092 v11.367c0,1.104,0.896,2,2,2c0.697,0,1.309-0.357,1.667-0.898c0.358,0.541,0.97,0.898,1.667,0.898c1.104,0,2-0.896,2-2v-8.037 C12.707,24.264,12.072,23.346,12.072,22.271z M25.344,10.415c-0.316-0.32-0.748-0.5-1.199-0.5h-3.644l-0.637,0.849l1.168,6.62 l-1.583,1.492l-1.583-1.492l1.169-6.62l-0.637-0.849H14.76c-0.933,0-1.689,0.756-1.689,1.688l-0.001,10.67 c0,0.933,0.756,1.688,1.688,1.688c0.199,0,0.386-0.041,0.563-0.104v12.798c0,1.243,1.008,2.252,2.252,2.252 c0.785,0,1.474-0.402,1.877-1.011c0.403,0.607,1.092,1.011,1.875,1.011c1.244,0,2.252-1.009,2.252-2.252V23.747 c0.146,0.042,0.295,0.072,0.455,0.074c0.959,0.038,1.693-0.741,1.703-1.673l0.096-10.528 C25.837,11.168,25.662,10.735,25.344,10.415z"/> </g> </g>

</svg>    </div> <Link :href="route('staff.executive')" class="ml-1"  :active="route().current('staff.executive')" >
                               Executive
                                </Link>
</div>


    <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('logout') }" ><div>
<svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      
    </div> <Link :href="route('staff.auth_logout')" class="ml-1"   method="post" as="button">
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
                                <Link :href="route('staff.dashboard')">
                                    <ApplicationLogo class="block w-auto h-12" />
                                </Link>
 </div>
<div class="flex flex-col items-start p-5  mt-16 justify-start laptop:min-h-[32rem] desktop:min-h-[45rem]">


   

<div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full "  :class="{ 'rounded-md bg-blues text-white max-w-full': route().current('settings') }"><div>
<svg width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  fill="none" stroke="currentColor">
<path class="a" d="M3,21.016l.78984-2.87249C5.0964,13.3918,8.5482,11.016,12,11.016" /><circle class="b" cx="12" cy="5.98404" r="5"/><circle class="a" cx="17" cy="18" r="5"/><polyline class="a" points="14.872 18.149 16.32 20.082 19.533 16.572"/></svg> 
   </div> <Link :href="route('staff.settings')" class="ml-1"  >
                                 User Verificaton
                                </Link>
</div>

 <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
<svg width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18 6H7V5h11zm0 2H7v1h11zm0 3H7v1h11zm-4 4h4v-1h-4zm0 3h3v-1h-3zm-2 2H7v-6h5zm-1-5H8v4h3zm10 8H4V2h17zM20 3H5v19h15z"/><path fill="none" d="M0 0h24v24H0z"/></svg>    </div> <Link :href="route('staff.article')" class="ml-1"  :active="route().current('staff.article')" >
                              Articles
                                </Link>
</div>

 <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
<svg width="30px" height="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18 6H7V5h11zm0 2H7v1h11zm0 3H7v1h11zm-4 4h4v-1h-4zm0 3h3v-1h-3zm-2 2H7v-6h5zm-1-5H8v4h3zm10 8H4V2h17zM20 3H5v19h15z"/><path fill="none" d="M0 0h24v24H0z"/></svg>    </div> <Link :href="route('staff.advisory')" class="ml-1"  :active="route().current('staff.advisory')" >
                              Advisory
                                </Link>
</div>

<div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss w-full" :class="{ 'rounded-md bg-blues text-white': route().current('home') }" ><div>
<svg fill="none" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="22px" viewBox="0 0 38.907 38.907" xml:space="preserve" stroke="currentColor">

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier"> <g> <path d="M15.611,3.706c0-2.422,1.72-3.706,3.842-3.706s3.842,1.283,3.842,3.706c0,2.421-1.721,5.06-3.842,5.06 C17.33,8.766,15.611,6.127,15.611,3.706z M9.952,7.961c1.885,0,3.412-2.344,3.412-4.494c0-2.15-1.527-3.291-3.412-3.291 c-1.885,0-3.412,1.141-3.412,3.291C6.538,5.617,8.066,7.961,9.952,7.961z M28.951,7.961c1.885,0,3.412-2.344,3.412-4.494 c0-2.15-1.527-3.291-3.412-3.291c-1.886,0-3.412,1.141-3.412,3.291C25.539,5.617,27.065,7.961,28.951,7.961z M34.184,9.425 c-0.28-0.284-0.664-0.443-1.063-0.443h-3.235l-0.564,0.754l1.037,5.88l-1.406,1.325l-1.404-1.325l1.037-5.88L28.02,8.982h-3.231 c-0.019,0-0.035,0.004-0.053,0.005c0.495,0.112,0.959,0.359,1.319,0.725c0.502,0.504,0.785,1.203,0.779,1.917l-0.096,10.529 c-0.012,1.057-0.598,1.941-1.453,2.377v8.199c0,1.104,0.896,2,2,2c0.695,0,1.309-0.357,1.666-0.898 c0.357,0.541,0.971,0.898,1.668,0.898c1.104,0,2-0.896,2-2V21.268c0.129,0.037,0.262,0.063,0.402,0.064 c0.852,0.034,1.506-0.658,1.514-1.486l0.086-9.351C34.623,10.094,34.467,9.71,34.184,9.425z M12.072,22.271l0.001-10.669 c0-1.277,0.897-2.345,2.094-2.617c-0.016,0-0.031-0.004-0.046-0.004h-3.236L10.32,9.735l1.038,5.88L9.952,16.94l-1.406-1.325 l1.038-5.88L9.019,8.981H5.787c-0.828,0-1.5,0.671-1.5,1.5l-0.001,9.476c0,0.828,0.671,1.5,1.5,1.5c0.176,0,0.343-0.036,0.5-0.092 v11.367c0,1.104,0.896,2,2,2c0.697,0,1.309-0.357,1.667-0.898c0.358,0.541,0.97,0.898,1.667,0.898c1.104,0,2-0.896,2-2v-8.037 C12.707,24.264,12.072,23.346,12.072,22.271z M25.344,10.415c-0.316-0.32-0.748-0.5-1.199-0.5h-3.644l-0.637,0.849l1.168,6.62 l-1.583,1.492l-1.583-1.492l1.169-6.62l-0.637-0.849H14.76c-0.933,0-1.689,0.756-1.689,1.688l-0.001,10.67 c0,0.933,0.756,1.688,1.688,1.688c0.199,0,0.386-0.041,0.563-0.104v12.798c0,1.243,1.008,2.252,2.252,2.252 c0.785,0,1.474-0.402,1.877-1.011c0.403,0.607,1.092,1.011,1.875,1.011c1.244,0,2.252-1.009,2.252-2.252V23.747 c0.146,0.042,0.295,0.072,0.455,0.074c0.959,0.038,1.693-0.741,1.703-1.673l0.096-10.528 C25.837,11.168,25.662,10.735,25.344,10.415z"/> </g> </g>

</svg>    </div> <Link :href="route('staff.executive')" class="ml-1"  :active="route().current('staff.executive')" >
                              Executive Settings
                                </Link>
</div>

            </div>
            <div class="px-3 ml-3 text-start">
    
   

                <div class="capitalize ">
        </div>

        <div class="flex items-center p-3 text-[0.9em] font-semibold text-gray-500 text-center justify-start bgss">
<svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      
     <Link :href="route('staff.auth_logout')" method="post" as="button" class="ml-1 text-sm text-blues" >
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
                          {{ $page.props.staff.staff_info.email}}
                    </div>
                           <div class="flex items-center justify-center w-8 h-8 ml-2 mr-3 text-center rounded-full " :style="{ backgroundColor: randomColor  }" >
                       <span class="font-medium uppercase text-md " > 
                            {{ $page.props.staff.staff_info.first_name.split(' ')[0][0] }}{{ $page.props.staff.staff_info.last_name.split(' ')[0][0] }}
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