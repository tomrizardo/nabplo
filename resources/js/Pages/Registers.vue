

<template>
<Head title="Register" />
    <RegLayout>

     <div class="items-start mx-auto justify-evenly laptop:flex tablet:block">
         <div
 
  class="fixed inset-0 z-10 flex items-center justify-center w-full modal bg-semi-75"
  v-if="!hide"
>
  
  <div class="w-full max-w-3xl p-8">
    <div
            class="m-1 overflow-hidden bg-gray-50 rounded-md  max-h-screen sm:h-[23rem] shadow-md md:mx-auto md:max-w-3xl"
            
        >
          
                
            <div class="bg-gray-50">
                <div
                    class="grid grid-cols-1 px-4 py-5 md:px-6 md:grid-cols-3 "
                   
                >
                <div class="mb-6 text-2xl font-bold text-center text-gray-800 sm:col-span-3">
                    Data Privacy Act Notice
                </div>
                    <div class="w-full col-span-3">
                        <div class="text-base font-medium text-gray-600">
             
I hereby consent the National Association of the Business Permits and Licensing Officers (NABPLO) to obtain and process the information provided for registration and membership purposes to the Association and to strictly adhere to the requirements stated under the Data Privacy Act of 2012.
              
                        </div>
                    </div>
                 
                </div>
                <div class="mb-6 text-lg font-semibold text-center">
                        Do you Accept?
                </div>
           <div class="items-center justify-between block w-3/4 mx-auto mb-6 sm:flex sm:mb-0 ">
           
               <PrimaryButton class="w-full mb-4 text-center sm:mb-0 rounded-xl sm:mr-6" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="cancel">
                    Cancel
                </PrimaryButton>
              
              
                 <PrimaryButton class="w-full text-center rounded-xl" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="accept">
                    I Accept
                </PrimaryButton>
           </div>
   
  </div>
  </div>

  </div>
</div>
<div class="desktop:max-w-[55rem] laptop:max-w-[45rem] sm:mt-0  mt-[6rem] block  ">
    <img  :src="$page.props.base_url + 'assets/1.png'" alt="" class="object-scale-down w-screen laptop:min-h-screen desktop:h-screen sm:object-contain ">

     <!-- <img :src="$page.props.base_url + 'assets/ann.png' " alt="" class="object-contain w-screen laptop:h-screen desktop:h-screen"> -->

</div>
<div  class="container w-screen mx-auto laptop:overflow-y-scroll test " ref="main">
            <!-- <div class="desktop:pl-[7rem] laptop:pl-[8rem] mt-10 mb-6 ml-0 text-3xl bg-black font-bold laptop:text-left ease-in-out desktop:ml-28   "> -->
                <div class="container items-center justify-center mx-auto ml-3 text-3xl font-bold text-gray-600 mt-14 tablet:max-w-2xl laptop:mx-auto tablet:ml-10 tablet:flex-col laptop:max-w-xl text-start ">
               Lets get started
                    <div class="mt-2 text-sm italic font-medium text-gray-500 ">
                Please tell us about yourself
               
            </div>
           

            </div>
         
        
          

        <form @submit.prevent="true" autocomplete="off" class="p-3 mx-auto tablet:max-w-2xl laptop:max-w-xl sm:mt-3 sm:p-0">
             <div class="w-full p-1 mx-2 text-sm text-red-500" v-if="Object.keys(form.errors).length>=1">
                Please Complete the required fields below
				<InputError class="mt-2" :message="form.errors.fullname" />
            </div>
            <div class="grid grid-cols-4 mb-3 sm:grid-cols-3 sm:gap-2">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">Personal Information</div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div>
              
           
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
                
                <InputLabel for="membr" value="Type of Membership" />
              
                    <select name="membr" id="membr"  v-model="form.membr_type"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden>
                                    Select one

                            </option>
                            <option  v-for="dept in test2" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
                    <InputError class="mt-2" :message="form.errors.membr_type" />
            </div>
           
                     <div class="mt-4" v-if="form.membr_type === 'Renewal'">
                <InputLabel for="since" value="Member Since" />
        
          
                    <select name="since" id="since"  v-model="form.membr_since"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected  disabled>
                                    Select Year

                            </option>
                            <option  v-for="dept in year" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
                     <InputError class="mt-2" :message="form.errors.membr_since" />
      
           
            </div>   
    <div class="mt-4">
                 <InputLabel for="memPaid" value="Membership Payment Options" />
                    <select name="memPaid" id="memPaid"  v-model="form.mempaid"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select one

                            </option>
                            <option value="Paid">
                                 Paid

                            </option>
                            <option value="Pay Later">
                                   Pay Later

                            </option>
                           

                    </select>
                    <InputError class="mt-2" :message="form.errors.mempaid" />
            </div>
                <div class="mt-4" v-if="form.mempaid ==='Paid'">
                <InputLabel for="since" value="Membership Fee" />
        
          
                    <select name="since" id="since"  v-model="form.membr_fee"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected  disabled>
                                    Select one

                            </option>
                            <option  v-for="dept in fee" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
                     <InputError class="mt-2" :message="form.errors.membr_fee" />
      
           
            </div>
              		

             
              <div v-if="form.mempaid ==='Paid'" >
  <InputLabel for="proof" value="Membership Attachment" class="mt-4"/>
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
                                                
                                                for="proof"
                                                class="p-2 mt-2 font-bold text-white bg-blue-500 rounded-md shadow cursor-pointer"
                                                > Upload here</label
                                            >
    <h2 class="mt-3 text-sm itallic ">Kindly Upload Proof Of Payment for membership</h2>
                                            <input
                                          
                                                type="file"
                                                id="proof"
                                                class="mb-5 upload-photo"
                                                 @input="
                                                    form.membr_filename=$event.target.files[0]"
                                                name="proof"
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
     

   <InputError class="mt-1" :message="form.errors.membr_filename" />
        </div>
   <div class="grid grid-cols-4 mt-6 mb-6 sm:grid-cols-3 sm:gap-2">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">LGU Information</div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div>
     <div class="mt-4">
                <InputLabel for="exec" value="Full Name of Local Chief Executive" />
                <TextInput id="exec" type="text" class="block w-full mt-1" v-model="form.exec_name"  />
                <InputError class="mt-2" :message="form.errors.exec_name" />
            </div>
             <div class="mt-4">
                <InputLabel for="addr" value="Office Address" />
                <TextInput id="addr" type="text" class="block w-full mt-1" v-model="form.full_addr"  />
                <InputError class="mt-2" :message="form.errors.full_addr" />
            </div>
<div class="mt-4 demo">

		<div class="row">
			<div class="w-full">
			  <InputLabel for="municipality" value="City / Municipality" class="mb-1"/>
				<SimpleTypeahead ref="inputRef" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :items="muni" placeholder="Search your city/municipality"  @selectItem="selectItem" @onInput="onInput"  :minInputLength="1" autocomplete="nope"  :itemProjection="
						(item) => {
							return item.name;
						}" />
                  <InputError class="mt-2" :message="form.errors.addr_municipality" />
				  <InputError class="mt-2" message="Please select from the results" v-if="form.errors.addr_municipality"/>
			</div>
			<div class="column column-40">
				
			</div>
		</div>
	</div>
         <div class="grid-cols-1 sm:grid sm:grid-cols-2 mt-4 ">
                   <div class="col-span-1 mt-1">
                <InputLabel for="position" value="Position" />
                <TextInput id="position" type="text" class="block w-full mt-1 " v-model="form.position" />
                <InputError class="mt-2" :message="form.errors.position" />
            </div>
            <div class="col-span-1 mt-1 sm:ml-4">
                 <InputLabel for="nat" value="Nature of Employment" />
                    <select name="nat" id="nat"  v-model="form.nat_employment"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select One

                            </option>
                            <option  v-for="depts in test3" :key="depts" >
                                    {{depts}}
                            </option>
                        
                    </select>
                    <InputError class="mt-2" :message="form.errors.nat_employment" />
            </div>
           
                </div>

            <div class="mt-4 ">
                
                <InputLabel for="dept" value="Department / Office" />
                <TextInput id="dept" type="text" class="block w-full mt-1" v-model="form.department"  />
                <InputError class="mt-2" :message="form.errors.department" />
           
            </div>
         
         <div class="grid grid-cols-4 mt-6 mb-6 sm:grid-cols-3 sm:gap-2">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">Survey on BPLS</div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div>  
               <!-- <div class="grid-cols-1 sm:grid sm:grid-cols-2 ">
                   <div class="col-span-1 mt-1">
                <InputLabel for="position" value="Position" />
                <TextInput id="position" type="text" class="block w-full mt-1 " v-model="form.position" />
                <InputError class="mt-2" :message="form.errors.position" />
            </div>
            <div class="col-span-1 mt-1 sm:ml-4">
                 <InputLabel for="nat" value="Nature of Employment" />
                    <select name="nat" id="nat"  v-model="form.nat_employment"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select One

                            </option>
                            <option  v-for="depts in test3" :key="depts" >
                                    {{depts}}
                            </option>
                        
                    </select>
                    <InputError class="mt-2" :message="form.errors.nat_employment" />
            </div>
           
                </div>

            <div class="mt-4 ">
                
                <InputLabel for="depts" value="Department / Office" />
                <TextInput id="depts" type="text" class="block w-full mt-1" v-model="form.department"  />
                <InputError class="mt-2" :message="form.errors.department" />
           
            </div>
              -->
            
         
<div class="mt-4">
                 <InputLabel for="org" value="1. Is your BPLO a separate department/office?" />
                    <select name="org" id="org"  v-model="form.org_setup"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select one

                            </option>
                            <option  v-for="dept in test" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
                    <InputError class="mt-2" :message="form.errors.org_setup" />
            </div>

                  <div class="mt-4">
                 <InputLabel for="local" value="2. Which of the following  offices does assessment for local business tax?" />
                    <select name="local" id="local"  v-model="form.bplo_func"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select One

                            </option>
                            <option  v-for="depts in test1" :key="depts" >
                                    {{depts}}
                            </option>

                    </select>
                    <InputError class="mt-2" :message="form.errors.bplo_func" />
            </div>
          <div class="mt-4" v-if="form.bplo_func==='Others'">
                <InputLabel for="oth" value="Others: Please Specify" />
                <TextInput id="oth" type="text" class="block w-full mt-1" v-model="form.others_org"  />
                <InputError class="mt-2" :message="form.errors.others_org" />
            </div>

<div class="mt-4">
                 <InputLabel for="eboss" value="3.  In setting up an Electronic Business One Stop Shop (e-BOSS), which of the following reform has not been implemented in your LGU?"/>
                    <select name="eboss" id="eboss"  v-model="form.eboss"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select one

                            </option>
                            <option  v-for="dept in test6" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
                    <InputError class="mt-2" :message="form.errors.eboss" />
            </div>
<div class="mt-4">
                 <InputLabel for="topics" value="4. Which of the following session topics would you like to attend?"/>
                    <select name="topics" id="topics"  v-model="form.topics"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select one

                            </option>
                            <option  v-for="dept in test7" :key="dept" >
                                    {{dept}}
                            </option>

                    </select>
                    <InputError class="mt-2" :message="form.errors.topics" />
            </div>

<!-- 
              <div class="flex items-center mt-4">
              

                          
    <h2 class="mt-1 text-xs itallic">Scanned Documents With Signatures</h2>
                                            <input
                                          
                                                type="file"
                                                id="govtid"
                                                class="mb-5 upload-photo"
                                                    @input="
                                                    form.reciept_filename =
                                                        $event.target.files[0]
                                                "
                                                name="upload"
                                                 accept="image/png, image/jpeg, image/jpg"
                                                @change="onFileChange"
                                            />
                             </div> -->
                                      <!-- <div  class="flex flex-col items-center justify-center mt-2">
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

            </div> -->
                  <div class="grid grid-cols-4 mt-6 mb-3 sm:grid-cols-3 sm:gap-2">
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">
                <div class="col-span-2 text-lg font-bold text-center text-gray-500 sm:mx-auto sm:col-span-1">Convention Payment  </div>
                <hr class="col-span-1 mt-3 bg-gray-200 border-2 sm:col-span-1">

            </div>  
               <div class="mt-4">
                 <InputLabel for="Paid" value="Payment Options" />
                    <select name="Paid" id="Paid"  v-model="form.paid"  class="block w-full mt-1 border-gray-300 rounded-md ">
                            <option value="" selected hidden disabled>
                                    Select one

                            </option>
                            <option value="Paid">
                                 Paid

                            </option>
                            <option value="Pay Later">
                                   Pay Later

                            </option>
                           

                    </select>
                    <InputError class="mt-2" :message="form.errors.paid" />
            </div>
            
            <div v-if='form.paid=="Paid"'>
  <InputLabel for="govtid" value="Attachment" class="mt-4" />
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
                                                
                                                for="govtid"
                                                class="p-2 mt-2 font-bold text-white bg-blue-500 rounded-md shadow cursor-pointer"
                                                > Upload here</label
                                            >
    <h2 class="mt-3 text-sm itallic ">Kindly Upload Proof Of Payment or Receipt Here</h2>
                                            <input
                                          
                                                type="file"
                                                id="govtid"
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
     

   <InputError class="mt-1" :message="form.errors.reciept_filename" />
        </div>
                              <div class="flex justify-center mt-6 mb-9 item-center">    
                            
                <PrimaryButton class="w-full text-center rounded-2xl sm:w-1/2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="submit">
                    Register
                </PrimaryButton>
       

</div>

        </form>
        </div>
</div>

<div>
    
</div>
    </RegLayout>
</template>
<script>

 import SimpleTypeahead from 'vue3-simple-typeahead';
import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
import RegLayout from '@/Layouts/RegLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/Rebutton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link,Head } from '@inertiajs/inertia-vue3';
 const test3= ["Permanent","Casual","Job Order", "Consultant"]
  const test6= ["Colocation of offices involved in BPLS","Integration of barangay clearance","Adoption of online assessment and payment"," Integration of FSIC in BPLS"]
 const test2= ["New","Renewal"]
  const test7 = ["Setting up an Electronic Business One Stop Shop","Integration of barangay clearance","Use of online payment facility", "Integration of FSIC fees","Use of electronic signature/official receipt"]
 const test4 = ["1st","2nd","3rd", "4th","5th","6th"]
  const year = ["1998","1999","2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018", "2019","2020","2021","2022"]
 const test5=["Special Class","Highly Urbanized","Component"]
 const test1= ["Business Permits And Licensing Office","City Treasurer's Office/Municipal Treasurer's Office",'Others']
 const test= ["Yes","No"]
  const ext_names=["I","II","III","IV","V","JR","SR"]
  const fee=["Highly Urbanized City - Php 10,000.00","Component City - Php 5,000.00","Municipality - Php 2,000.00"]
  
export default{
 
components:{
RegLayout,InputError,InputLabel,PrimaryButton,Link,TextInput,SimpleTypeahead,Head

},
props:{
    municipality:{type: Array, default: () => null },
},
created() {
		this.listFiltered = this.muni;
	},
data(){
return{
hide:false,
test4,
test5,
year,
test6,
fee,
test7,
    currentStep:'',
    test,
    test1,
    test2,
       test3,
    ext_names,
options: {
				placeholder: 'Start writing a programming language',
				minInputLength: 1,
			},
  muni:this.municipality,
  listFiltered: [],
  holders:'',
    holder:'',
  form: this.$inertia.form({
                paid:"",
              ext_name:"",
              topics:"",
                first_name: "",
                 last_name: "",
                  mid_name: "",
                  position:"",
                  department:"",
                  exec_name:"",
                      addr_municipality:'',
                      addr_type:"",
                        others_org:"",
                      contact_no:"",
                          full_addr:"",
                          nat_employment:"",
                          org_setup:"",
                          bplo_func:"",
                          membr_type:"",
                        paid:"",
                        eboss:"",
                        membr_fee:"",
                        membr_filename:"",
                          membr_since:null,    
						mempaid:"",						  
                email: "",
                reciept_filename:"",
         
             

                lgu_class:"",
                
            }),

}

},
methods:{
      
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
        accept(e){
            this.hide = !this.hide;
            e.preventDefault();
        },
         cancel(){
         this.$inertia.visit(route('guest_home'), {'method': 'get'});
     },
        submit() {
            this.hasErrors = false;

            this.error_fullname = '';

            this.form.post(this.route("register"), {
                  forceFormData: true,
                onFinish: () => {},
                  onError: (resp_data) => {
                    this.$refs.main.scrollTo(0, 0);
					this.$refs.inputRef.clearInput();
                      
                 },
                onSuccess: (resp_data) => {
                    const { ref_id} = resp_data.props;

                console.log(ref_id);

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


  
         selectItem(item) {
		 this.form.addr_municipality = item.name;
			this.form.addr_type = item.lgu_type;
            this.form.lgu_class = item.classification;
		},
		onInput(event) {
			

			this.listFiltered = event.items;
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

@media screen and (min-width: 1024px) {
    .test{
        height: 91vh;
    }
 
}
</style>