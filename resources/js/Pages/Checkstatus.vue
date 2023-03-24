<template>
    <Head title="Track Status" />

    <div
 
  class="fixed inset-0 z-10 flex items-center justify-center w-full modal bg-semi-75"
  v-if="hides"
>
  
  <div class="w-full max-w-3xl p-8">
    <div
            class="m-1 overflow-hidden bg-gray-50 rounded-md  max-h-screen sm:h-[23rem] shadow-md md:mx-auto md:max-w-3xl"
            
        >
          
                
            <div class="bg-gray-50">
                <div
                    class="flex flex-col items-center justify-center px-4 py-6 md:px-6"
                   
                >
                <div class="mb-6 text-2xl font-bold text-center text-gray-800 sm:col-span-3">
                  You Have Successfully Updated Your Registration
                </div>
                    <div class="w-full">
                        <svg
                    version="1.1"
                    id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    fill="#4AB655"
                    height="120px"
                    width="120px"
                    class="mx-auto mt-6"
                    x="0px"
                    y="0px"
                    viewBox="0 0 475 475"
                    style="enable-background: new 0 0 475 475"
                    xml:space="preserve"
                >
                    <g transform="translate(0 -540.36)">
                        <g>
                            <g>
                                <path
                                    d="M405.7,610.06c-44.7-44.9-104.3-69.7-167.8-69.7C106.7,540.36,0,647.06,0,778.26c0,63.5,24.8,123.1,69.7,167.8
				c44.9,44.7,104.6,69.3,168.2,69.3c63.5,0,123.1-24.6,167.8-69.3s69.3-104.3,69.3-167.8C475,714.66,450.4,654.96,405.7,610.06z
				 M237.9,1000.36c-122.9,0-222.9-99.6-222.9-222.1c0-122.9,100-222.9,222.9-222.9c122.5,0,222.1,100,222.1,222.9
				C460,900.76,360.4,1000.36,237.9,1000.36z"
                                />
                                <path
                                    d="M367.8,696.86l-211.1,145.6l-47.7-68.4c-2.3-3.4-7-4.3-10.4-1.9c-3.4,2.3-4.3,7-1.9,10.4l52,74.5
				c1.5,2.1,3.8,3.2,6.2,3.2v0c1.5,0,2.9-0.5,4.2-1.4l217.2-149.7c3.4-2.3,4.3-7,1.9-10.4C375.9,695.36,371.2,694.46,367.8,696.86z"
                                />
                            </g>
                        </g>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
                    </div>
                 
                </div>
             
           <div class="items-center justify-between block w-3/4 mx-auto mt-6 mb-6 sm:flex sm:mb-0 sm:mt-10">
          
               <BreezeButton class="w-full mb-4 text-center sm:mb-0 rounded-xl sm:mr-6"  @click="track">
                    Track again
                </BreezeButton>
         
           
                 <BreezeButton class="w-full text-center rounded-xl" @click="home" >
                   Go back to homepage
                </BreezeButton>
                
           </div>
   
  </div>
  </div>

  </div>
</div>
    <div class="min-h-[50rem]">
    <div class="w-screen mt-20 text-center ">
        <h1 class="text-2xl font-bold text-blue-500">Track Status Here</h1>

        <div
            class="max-w-xl p-6 mx-auto mt-3 buts"
        >
            <BreezeLabel
                for="trackorder"
                value="Reference Number"
                class="mb-2 ml-2 text-lg font-bold text-left text-gray-500"
            />
            <BreezeInput
                type="text"
                id="trackorder"
                name="trackorder"
                v-model="refno"
                class="block w-full mt-1"
                placeholder="Enter Reference Number Here"
            />
            <div>
                <span
                    class="text-red-500"
                    v-if="alert.alert_type === 'error'"
                    >{{ alert.alert_message }}</span
                >
            </div>
            <span class="text-sm italic"
                >If you cant track your reference number please contact us at
                <span class="text-blue-600">(0915)8941764</span>
            </span>

            <div>
            <BreezeButton
                :class="{ 'opacity-25': track_disabled }"
                :disabled="track_disabled"
                class="flex items-center justify-center w-full mx-auto mt-4 rounded-2xl sm:w-1/3"
                @click="findStatus()"
                >TRACK NOW
                <div v-if="track_disabled">
                    <div
                        style="border-top-color: transparent"
                        class="w-5 h-5 ml-4 border-2 border-white border-solid rounded-full animate-spin"
                    ></div></div
            ></BreezeButton>
            </div>
        </div>

        <div

            class="max-w-xl mx-3 sm:p-6 sm:mt-0 md:mx-auto"
            v-if="show_data"
        >
        <div v-if="form.paid === 'PAY LATER' ||form.mempaid ==='PAY LATER' " class="mb-6 font-semibold text-red-500 text-md">
                Please upload payment information below to update your registration
        </div>
       
    <div class="mb-6 text-xl font-bold text-gray-500">
         <BreezeLabel
                for="trackorder"
                value="Participant Details"
                class="mb-2 ml-2 text-lg font-bold text-center text-gray-500"
            />
    </div>
        <form>
            <div class="gap-3 text-left ">
                <div class="">
                    <BreezeLabel
                        for="trackorder"
                        value="Full Name:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
                    <BreezeInput
                    disabled
                       type="text"
                        for="trackorder"
                        :value="last_name"
                        class="block w-full mt-1 bg-gray-200"
                    />
                </div>
               
      
                
               
  <div class="mt-4">
                    <BreezeLabel
                        for="trackorder"
                        value="City/Municipality:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
                    <BreezeInput
                    disabled
                       type="text"
                        for="trackorder"
                        :value="form.addr_municipality"
                        class="block w-full mt-1 bg-gray-200"
                    />
                </div>
                   <div class="mt-4">
                    <BreezeLabel
                        for="trackorder"
                        value="Membership Payment:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
                    <BreezeInput
                    disabled
                       type="text"
                        for="trackorder"
                        :value="form.mempaid"
                        class="block w-full mt-1 bg-gray-200"
                    />
                     <span class="w-full ml-1 text-xs italic sm:text-sm" v-if="form.mempaid ==='PAY LATER'">
                        Note: Please upload receipt below to update your registration
                    </span>
                </div>
                <div class="mt-4">
                    <BreezeLabel
                        for="trackorder"
                        value="Convention Payment:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
                    <BreezeInput
                    disabled
                       type="text"
                        for="trackorder"
                        :value="form.paid"
                        class="block w-full mt-1 bg-gray-200"
                    />
                    <span class="w-full ml-1 text-xs italic sm:text-sm" v-if="form.paid ==='PAY LATER'">
                        Note: Please upload receipt below to update your registration
                    </span>
                </div>
 
                     <div class="mt-4 ">
                    <BreezeLabel
                        for="trackorder"
                        value="Status:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
                    <BreezeInput
                    disabled
                       type="text"
                        for="trackorder"
                        :value="verification_status"
                        class="block w-full mt-1 bg-gray-200"
                    />
                </div>
                   <div v-if="verification_status === 'Verified'" class="mt-3 ml-1 font-bold text-blue-500 text-md">
               Your Application is on track, See you at the Convention 
        </div>


            <div v-if="form.paid === 'PAID' && form.mempaid === 'PAID'  && verification_status ==='PENDING'" class="mt-3 ml-1 font-bold text-blue-500 text-md">
               We are verifying your registration please come back soon.
        </div>

                   <div class="grid grid-cols-4 mt-6 mb-3 sm:grid-cols-3 sm:gap-2" v-if="form.mempaid ==='PAY LATER'">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">Membership Attachment</div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div>  
     
  <div class="mt-4"  v-if="form.mempaid ==='PAY LATER'">
                  <BreezeLabel
                        for="trackorders"
                        value="Attachment:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
   <div class="py-3 mt-1 border-4 border-dashed">
       
          <div  class="flex flex-col items-center justify-center mt-3"  v-if="!holders">
 
   <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-10 h-10 mt-4 "
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="black"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                                    /></svg
                                                >
                                            <label
                                                
                                                for="trackorders"
                                                class="p-2 mt-2 font-bold text-white bg-blue-500 rounded-md shadow cursor-pointer"
                                                > Upload here</label
                                            >
    <h2 class="mt-3 text-sm itallic ">Kindly Upload Proof Of Payment or Receipt Here</h2>
                                            <input
                                          
                                                type="file"
                                                id="trackorders"
                                                class="mb-5 upload-photo"
                                                 @input="
                                                    form.membr_filename=$event.target.files[0]"
                                                name="upload"
                                                 accept="image/png, image/jpeg, image/jpg"
                                                @change="onFileChanges"
                                            />
                             </div>
                                      <div  class="flex flex-col items-center justify-center mt-2" v-else>
                                          <img
                                                    class="object-contain w-full max-h-40"
                                                    :src="holders"
                                                />
                                      
                                  <button
                                                    class="p-2 mt-4 text-red-500 border "
                                                    @click="removeImages"
                                                >
                                                    Remove Image
                                                </button>
                                       
        </div>
         
           </div>   

     

   <InputError class="mt-1" :message="form.errors.membr_filename"  />
      

                          
       </div>

       <div class="grid grid-cols-4 mt-6 mb-3 sm:grid-cols-3 sm:gap-2" v-if="form.paid ==='PAY LATER'">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">Convention Attachment</div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div>  
                <div class="mt-4"  v-if="form.paid ==='PAY LATER'">
                  <BreezeLabel
                        for="trackorder"
                        value="Attachments:"
                        class="mb-2 ml-2 font-bold text-gray-500 text-md"
                    />
   <div class="py-3 mt-1 border-4 border-dashed">
       
          <div  class="flex flex-col items-center justify-center mt-3"  v-if="!holder">
 
   <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-10 h-10 mt-4 "
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="black"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                                    /></svg
                                                >
                                            <label
                                                
                                                for="test"
                                                class="p-2 mt-2 font-bold text-white bg-blue-500 rounded-md shadow cursor-pointer"
                                                > Upload here</label
                                            >
    <h2 class="mt-3 text-sm itallic ">Kindly Upload Proof Of Payment or Receipt Here</h2>
                                            <input
                                          
                                                type="file"
                                                id="test"
                                                class="mb-5 upload-photo"
                                                 @input="
                                                    form.reciept_filename=$event.target.files[0]"
                                                name="upload"
                                                 accept="image/png, image/jpeg, image/jpg"
                                                @change="onFileChange"
                                            />
                             </div>
                                      <div  class="flex flex-col items-center justify-center mt-2" v-else>
                                          <img
                                                    class="object-contain w-full max-h-40"
                                                    :src="holder"
                                                />
                                      
                                  <button
                                                    class="p-2 mt-4 text-red-500 border "
                                                    @click="removeImage"
                                                >
                                                    Remove Image
                                                </button>
                                       
        </div>
         
           </div>   

     

   <InputError class="mt-1" :message="form.errors.reciept_filename"  />
      

                            
       </div>
         <div class="flex justify-center mt-8 mb-9 item-center" v-if="form.paid==='PAY LATER' || form.mempaid==='PAY LATER'">    
                            
                <BreezeButton class="w-full text-center rounded-2xl sm:w-1/2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="submit">
                    Update Registration
                </BreezeButton>
                </div>
             
            </div>
            </form>
        </div>
        </div>
    </div>
</template>

<script>
import InputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/InputLabel.vue';
import BreezeButton from '@/Components/Rebutton.vue';
import BreezeInput from '@/Components/TextInput.vue';
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import { Head ,Link} from '@inertiajs/inertia-vue3';
import axios from 'axios';

export default {
    layout: BreezeGuestLayout,

    components: {
        Head,
        Link,
        InputError,
        BreezeInput,
        BreezeLabel,
        BreezeButton,
    },
    data() {
        return {
            hides:false,
            hide : true,
            track_disabled: false,
            show_data: false,
            alert: {
                alert_type: "",
                alert_message: "",
            },
            refno: "",
            verification_status: "VERIFIED",
            last_name: "",
            disp_refno: '',
        holder:"",
        holders:"",
            
             form: this.$inertia.form({
            last_name:"",
                user_id:"",
                addr_municipality:"",
                first_name:"",
                reciept_filename:"",
                  membr_filename:"",
                paid:"",
                mempaid:"",
                
             }),
        };
    },

    methods: {
         findStatus() {
            this.track_disabled = true;
            this.alert.alert_type = '';
            this.alert.alert_message = '';
            
            axios
            .post(this.route('check_request_status'), {
                'ref_no': this.refno,
            }).then(response => {
                this.track_disabled = false;

                const { alert_type, alert_message, } = response.data.alert;
                console.log(response.data);
               
                if (alert_type == 'error') {
                    this.alert.alert_type = alert_type;
                    this.alert.alert_message = alert_message;

                    this.show_data = false;

                } 
                 

                else {
                    const {user_id,validation_status, last_name, first_name,mid_name,ext_name,addr_municipality,paid,mempaid} = response.data.info;
                    
                    this.form.addr_municipality = addr_municipality;
                    this.disp_refno = this.refno;
                    this.verification_status = validation_status;
                    this.last_name = last_name +' '+ first_name +' '+ mid_name +' '+ ext_name;
                    this.first_name = first_name;
                    this.form.last_name=last_name;
                      this.form.first_name=first_name;
                        this.form.mid_name=mid_name;
                          this.form.ext_name=ext_name;
                    this.mid_name = mid_name;
                    this.ext_name = ext_name;
                    this.form.user_id = user_id;
                    this.show_data = true;
                    this.form.paid = paid;
                    this.form.mempaid = mempaid;

                }
                // console.log(this.route('staff.login'));
                // window.location.href = this.route('staff.login');

            }).catch(error => {
                // console.log(error.response);
                if (error.response) {
                    this.alert.alert_type = 'error';
                    this.alert.alert_message = error.response.data.errors.ref_no[0];
                    this.track_disabled = false;
                    this.show_data = false;
                }
                // location.reload();
            });

            

        },
      
   onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            
            this.createImage(files[0]);
        },
        createImage(file) {
             var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.holder = e.target.result;
              
            
            };
            reader.readAsDataURL(file);
            
        },
       removeImage: function (e) {
            this.form.reciept_filename = "";
                this.holder=""
        },
               onFileChanges(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
          
            this.createImages(files[0]);
        },
        createImages(file) {
             var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.holders = e.target.result;

            
            };
            reader.readAsDataURL(file);
            
        },
       removeImages: function (e) {
            this.form.membr_filename = "";
                this.holders=""
        },

track(){
     
         this.$inertia.visit(route('checkstatus'), {'method': 'get'});
   
},

home(){
     
         this.$inertia.visit(route('guest_home'), {'method': 'get'});
   
},

         submit() {
            this.hasErrors = false;

            this.error_fullname = '';

            this.form.post(this.route("update"), {
                  forceFormData: true,
                onFinish: () => {
  this.hides = true;

                },
               
                onSuccess: (resp_data) => {
                    const { ref_id} = resp_data;
                    this.holder = '',
                  

               
this.show_data = false;
                   
                },
        
            });
        },
        
    },
};
</script>

<style>
#upload-photo {
    opacity: 0;

    z-index: -1;
}


.upload-photo {
    opacity: 0;

    z-index: -1;
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
