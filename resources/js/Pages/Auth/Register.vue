

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="w-screen h-screen ">
      <div
 
  class="fixed inset-0 z-10 flex items-center justify-center w-full modal bg-semi-75"
  v-if="!hide"
>
  
  <div class="w-full max-w-3xl p-8">
    <div
            class="m-1 overflow-hidden bg-gray-50 rounded-md  max-h-screen sm:h-[34rem] shadow-md md:mx-auto md:max-w-3xl"
            
        >
          
                
            <div class="bg-gray-50">
            
                <div
                    class="grid grid-cols-1 px-4 py-5 md:px-6 md:grid-cols-3 "
                   
                >
                     <div ref="lottieContainer" class="max-h-full col-span-1 col-start-2 sm:max-h-full "></div>
                <div class="col-span-3 mb-6 text-2xl font-bold text-center text-gray-800 sm:col-span-3">
                    Data Privacy Act Notice
                </div>
               
                    <div class="w-full col-span-3">
                        <div class="text-xs font-medium text-left text-gray-600 sm:text-base sm:text-left">
             
I hereby consent the National Association of the Business Permits and Licensing Officers (NABPLO) to obtain and process the information provided for registration and membership purposes to the Association and to strictly adhere to the requirements stated under the Data Privacy Act of 2012.
              
                        </div>
                    </div>
                 
                </div>
                <div class="mb-6 text-lg font-semibold text-center">
                        Do you Accept?
                </div>
           <div class="items-center justify-between block w-3/4 mx-auto mb-6 sm:flex sm:mb-0 ">
           
               <PrimaryButton class="w-full mb-4 text-center bg-white sm:mb-0 rounded-xl sm:mr-6 border-blues text-blues" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="cancel">
                    Cancel
                </PrimaryButton>
              
              
                 <PrimaryButton class="w-full text-center rounded-xl bg-blues" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="accept">
                    I Accept
                </PrimaryButton>
           </div>
   
  </div>
  </div>

  </div>
</div>
    
        <div class="max-w-2xl px-3 mx-auto mt-20 sm:p-0">
            
            <div class="mb-2">
                <div class="text-3xl font-bold text-blue-500 ">
            Lets get started
                </div>
            <div class="mt-1 text-sm italic font-medium text-gray-500 ">
                Please tell us about yourself
               
            </div>
            </div>
        <form @submit.prevent="submit">
           <div class="w-full p-1 mx-2 text-sm text-red-500" v-if="Object.keys(form.errors).length>=1">
                Please Complete the required fields below
				<InputError class="mt-2" :message="form.errors.fullname" />
            </div>
            <!-- <div class="grid grid-cols-4 mb-3 sm:grid-cols-3 sm:gap-2">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">Personal Information</div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div> -->
              
           
            <div>
                <InputLabel for="last_name" value="Last Name" />
                <TextInput id="last_name" type="text" class="block w-full mt-1" v-model="form.last_name"/>
                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>

            <div class="grid grid-cols-3 mt-4">
                <div class="col-span-2">
                <InputLabel for="first_name" value="First Name" />
                <TextInput id="first_name" type="text" class="block w-full mt-1" v-model="form.first_name"  />
                <InputError class="mt-2" :message="form.errors.first_name" />
                </div>
                <div class="col-span-1 ml-2">
                      <InputLabel for="suffix" value="Suffix" />
                  <select
                                    v-model="form.ext_name"
                                    name="ext_name"
                                    id="ext_name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm "
                                >
                                    <option value=""  selected >
                                       None
                                    </option>
                                 
                                    <option
                                        v-for="(ext, i) in ext_names"
                                        :value="ext"
                                        :key="i"
                                    >
                                        {{ ext }}
                                    </option>
                                </select>
                </div>
            </div>
              <div class="mt-4">
                <InputLabel for="mid_name" value="Middle Name" />
                <TextInput id="mid_name" type="text" class="block w-full mt-1" v-model="form.mid_name" />
                <InputError class="mt-2" :message="form.errors.mid_name" />
            </div> 

             
             <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" type="email" class="block w-full mt-1" v-model="form.email"/>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
              <div class="mt-4">
                <InputLabel for="contact_no" value="Mobile No." />
                <TextInput id="contact_no" type="number" class="block w-full mt-1" v-model="form.contact_no" :class="{'border-red-500': form.errors.contact_no } " @blur="form.errors.contact_no == false"/>
                <InputError class="mt-2" :message="form.errors.contact_no" />
            </div>
               

        

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
               <div class="relative">
    <TextInput id="password" :type="passwordFieldType" class="block w-full mt-1" v-model="form.password" required autocomplete="new-password" />
    <button type="button" class="absolute transform -translate-y-1/2 top-1/2 right-3" @click="togglePasswordVisibility">
      <span v-if="showPassword">Hide</span>
      <span v-else>Show</span> 
    </button>
  </div>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password"  />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <Link :href="route('login')" class="text-sm text-gray-600 underline hover:text-gray-900">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4 bg-blue-500 " >
                    Register
                </PrimaryButton>
            </div>



        </form>
        </div>
        </div>
    </GuestLayout>
</template>
<script>
import lottie from 'lottie-web';
import GuestLayout from '@/Layouts/Guest.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link } from '@inertiajs/inertia-vue3';
   const test= ["Planning","Building","CENRO","Fire","Vet","Legal","Occu"]
      const region= ["NCR","REGION I","REGION II","REGION III","REGION IV","REGION IV-B","REGION V","REGION VI","REGION VII","REGION VIII","REGION IX","REGION X","REGION XI","REGION XII","REGION XIII","CAR","ARMM",]
export default{
 
components:{
GuestLayout,InputError,InputLabel,PrimaryButton,Link,TextInput

},

data(){
return{
    hide:false,
    region,
    test,
  form: this.$inertia.form({

           
                first_name: "",
                 last_name: "",
                  mid_name: "",
       
                      contact_no:"",                      
                email: "",
                password: "",
                password_confirmation: "",
                
            }),
  showPassword: false,
}

},
  computed: {
    passwordFieldType() {
      return this.showPassword ? 'text' : 'password'
    },
  },
methods:{
            accept(e){
            this.hide = !this.hide;
            e.preventDefault();
        },
         cancel(){
         this.$inertia.visit(route('guest_home'), {'method': 'get'});
     },
 togglePasswordVisibility() {
      this.showPassword = !this.showPassword
    },
        submit() {
            this.hasErrors = false;

            this.error_fullname = '';

            this.form.post(this.route("register"), {
                onFinish: () => {},
                onSuccess: (resp_data) => {
                    // const { ref_id, message, sent_otp } = resp_data.props;

                    // console.log(resp_data);

                    // this.show_otp = true;
                    // this.code = ref_id;

                    // this.mobile_number_active = this.form.mobile;

                    // this.otp_error = !sent_otp;

                    // this.otp_err_msg = message;

                    this.form.reset(
                      
                     
                        "name",
                        "email",
                        "password",
                        "password_confirmation",
                    
                    );
                },
        
            });
        },
},
mounted() {
  const container = this.$refs.lottieContainer;
  const animation = lottie.loadAnimation({
    container: container,
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: `http://172.16.1.218:8000/img/logo/lot.json`
  });
}

}

</script>

<style>
select{
      -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: #fff;
  border-color: #6b7280;
  border-width: 1px;
  border-radius: 0px;
  padding-top: 0.5rem;
  padding-right: 0.75rem;
  padding-bottom: 0.5rem;
  padding-left: 0.75rem;
  font-size: 1rem;
  line-height: 1.5rem;

}

.sd label {
    border-width: 15px;
    justify-content: center;
    align-items: center;
    margin: 0 4rem;
    display: flex;
    background-color: #4ab655;
    border-color: #4ab655;
}

.modal{
    background: rgba(82, 80, 80, 0.3);
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}

</style>