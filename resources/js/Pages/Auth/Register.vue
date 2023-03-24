

<template>
    <GuestLayout>
        <Head title="Register" />
        <div class="max-w-3xl mx-auto">

        
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="last_name" value="Last Name" />
                <TextInput id="first_name" type="text" class="block w-full mt-1" v-model="form.last_name"/>
                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="first_name" value="First Name" />
                <TextInput id="first_name" type="text" class="block w-full mt-1" v-model="form.first_name"  />
                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>
              <div class="mt-4">
                <InputLabel for="mid_name" value="Middle Name" />
                <TextInput id="mid_name" type="text" class="block w-full mt-1" v-model="form.middle_name" />
                <InputError class="mt-2" :message="form.errors.middle_name" />
            </div> 
             <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" type="email" class="block w-full mt-1" v-model="form.email"/>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
              <div class="mt-4">
                <InputLabel for="contact_no" value="Mobile No." />
                <TextInput id="contact_no" type="number" class="block w-full mt-1" v-model="form.contact_no"/>
                <InputError class="mt-2" :message="form.errors.contact_no" />
            </div>
            <div class="flex items-center ">
            <div class="mt-4">
                 <InputLabel for="department" value="Department" />
                    <select name="department" id="department"  v-model="form.department"  class="block w-full border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select Department

                            </option>
                            <option  v-for="dept in test" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
            </div>
              <div class="mt-4 ml-2">
                <InputLabel for="position" value="Position" />
                <TextInput id="position" type="text" class="block w-full " v-model="form.position" />
                <InputError class="mt-2" :message="form.errors.position" />
            </div>
                </div>
          

              <div class="flex items-center mt-4">
                <div class="mr-3">
                 <InputLabel for="region" value="Province" />
                    <select name="region" id="region"  v-model="form.addr_region" class="block w-full border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select Region

                            </option>
                            <option  v-for="reg in region" :key="reg" >
                                    {{reg}}
                            </option>

                    </select>
                    </div>
                    <div class="mr-3">
                      <InputLabel for="region" value="Municipality" />
                    <select name="region" id="region"  v-model="form.addr_province" class="block w-full border-gray-300 rounded-md">
                            <option value="" selected hidden disabled>
                                    Select Province

                            </option>
                            <option  v-for="reg in region" :key="reg" >
                                    {{reg}}
                            </option>

                    </select>
                    </div>
                    <div>
                      <InputLabel for="region" value="Region" />
                    <select name="region" id="region"  v-model="form.addr_municipality" class="block w-full border-gray-300 rounded-md">
                            <option value="" selected hidden disabled>
                                    Select Municipality

                            </option>
                            <option  v-for="reg in region" :key="reg" >
                                    {{reg}}
                            </option>

                    </select>
                    </div>
                    
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" type="password" class="block w-full mt-1" v-model="form.password" required autocomplete="new-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password" />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="text-sm text-gray-600 underline hover:text-gray-900">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>



        </form>
        </div>
    </GuestLayout>
</template>
<script>
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
    region,
    test,
  form: this.$inertia.form({

           
                first_name: "",
                 last_name: "",
                  mid_name: "",
                  position:"",
                  department:"",
                  addr_province:"",
                    addr_region:"",
                      addr_municipality:"",
                      contact_no:"",                      
                email: "",
                password: "",
                password_confirmation: "",
                
            }),

}

},
methods:{

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

</style>