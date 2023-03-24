

<template>
    <Head title="Success" />

    <GuestLayout>
         <div class="flex flex-col items-center justify-start mt-[7rem] w-screen min-h-screen ">
            <div class="p-12 bg-green-100">

                <div class="">
                    <svg class="mx-auto text-center svg-icon" style="width: 5em; height: 5em;vertical-align: middle;fill: currentColor;overflow: hidden; " viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M602.026667 328.106667h-358.4c-18.773333 0-34.133333-15.36-34.133334-34.133334s15.36-34.133333 34.133334-34.133333h358.4c18.773333 0 34.133333 15.36 34.133333 34.133333s-15.36 34.133333-34.133333 34.133334zM392.96 515.84h-153.6c-18.773333 0-34.133333-15.36-34.133333-34.133333s15.36-34.133333 34.133333-34.133334h153.6c18.773333 0 34.133333 15.36 34.133333 34.133334s-15.36 34.133333-34.133333 34.133333zM324.693333 703.573333h-85.333333c-18.773333 0-34.133333-15.36-34.133333-34.133333s15.36-34.133333 34.133333-34.133333h85.333333c18.773333 0 34.133333 15.36 34.133334 34.133333s-15.36 34.133333-34.133334 34.133333zM682.666667 426.666667c-141.226667 0-256 114.773333-256 256s114.773333 256 256 256 256-114.773333 256-256-114.773333-256-256-256z m0 443.733333c-103.68 0-187.733333-84.053333-187.733334-187.733333s84.053333-187.733333 187.733334-187.733334 187.733333 84.053333 187.733333 187.733334-84.053333 187.733333-187.733333 187.733333z" fill="#4C4C4C" /><path d="M682.666667 767.146667c-13.226667 13.226667-34.986667 13.226667-48.213334 0l-72.533333-72.533334c-13.226667-13.226667-13.226667-34.986667 0-48.213333 13.226667-13.226667 34.986667-13.226667 48.213333 0l72.533334 72.533333c13.226667 13.226667 13.226667 34.986667 0 48.213334z" fill="#4C4C4C" /><path d="M803.413333 646.4L682.666667 767.146667c-13.226667 13.226667-34.986667 13.226667-48.213334 0-13.226667-13.226667-13.226667-34.986667 0-48.213334l120.746667-120.746666c13.226667-13.226667 34.986667-13.226667 48.213333 0 13.226667 13.226667 13.226667 34.986667 0 48.213333z" fill="#4C4C4C" /><path d="M358.4 805.973333H156.16v-648.533333h529.066667V358.4c0 18.773333 15.36 34.133333 34.133333 34.133333s34.133333-15.36 34.133333-34.133333V140.373333c0-28.16-23.04-51.2-51.2-51.2h-563.2c-28.16 0-51.2 23.04-51.2 51.2v682.666667c0 28.16 23.04 51.2 51.2 51.2H358.4c18.773333 0 34.133333-15.36 34.133333-34.133333 0-19.2-15.36-34.133333-34.133333-34.133334z" fill="#4C4C4C" /></svg>
                </div>
            <div class="mt-3 text-2xl text-center text-gray-600">
                You have successfully registered for the convention
            </div>
                      <div class="mt-[1rem] text-2xl text-center text-gray-600 capitalize">
 {{$page.props.fullname}}
                    </div>
              <div class="mt-3 text-xl font-bold text-center text-gray-600">
                REFERENCE NO:
                
              </div>
                     <div class="mt-2 text-xl font-semibold text-center text-gray-600">
             
                 {{$page.props.ref_id}}
              </div>
              <QrcodeVue
          :value="$page.props.ref_id"
           :size="size" level="H"
           class="mx-auto mt-8"
        />
          
              <div class="mt-7 text-lg font-medium text-justify text-gray-600">
              <span class="text-lg font-bold">Note:</span>   Please Take a Screenshot of this page and give us some time to verify your application
              </div>

        

                    </div>
                    
                              <div class="flex justify-center mt-6 mb-5 item-center">    
                         <Link :href="route('guest_home')" >   
                <PrimaryButton class="w-full text-center rounded-2xl" >
                    Go Back Home
                </PrimaryButton>
            </Link>

</div>
                 
               
              
       </div>
    </GuestLayout>
</template>
<script>
  import QrcodeVue from 'qrcode.vue'
import GuestLayout from '@/Layouts/Guest.vue'
import PrimaryButton from '@/Components/Rebutton.vue';
import {Link,Head } from '@inertiajs/inertia-vue3';
export default {
    props:{},
    components:{
        PrimaryButton,Link,Head ,QrcodeVue,
GuestLayout,
    },

    data(){
        return{
        
            size:230,
        }
    }
}
</script>