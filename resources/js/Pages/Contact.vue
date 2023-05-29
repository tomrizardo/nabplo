<template>
    <Head title="Contact Us" />

    <GuestLayout>
      <div class="flex flex-col items-center w-screen mt-14">
      <h1 class="text-4xl font-bold text-center text-blue-500">Contact Us</h1>

      <div class="relative w-full max-w-xl mt-12">
      
        <form class="relative px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" @submit.prevent="submitForm">
          <div class="flex gap-6 justify-items-start">

          <div class="mb-4">
            <InputLabel class="block mb-2 font-bold text-gray-700" for="name">Name</InputLabel>
            <TextInput v-model="form.name" class="input-field" id="name" type="text"  />
          </div>
          <div class="mb-4">
            <InputLabel class="block mb-2 font-bold text-gray-700" for="email">Email</InputLabel>
            <TextInput v-model="form.email" class="input-field" id="email" type="email"  />
          </div>
          </div>
          <div class="mb-4">
            <InputLabel class="block mb-2 font-bold text-gray-700" for="subject">Subject</InputLabel>
            <textarea v-model="form.subject" rows="6" class="w-full border-gray-200 textarea-field" placeholder="Write your thoughts here..."></textarea>
          </div>
          <div class="flex items-start justify-between">
            <div></div>
            <PrimaryButton  type="submit" class="text-white bg-blues">Submit</PrimaryButton>
          </div>
        </form>
      </div>

  
</div>

    </GuestLayout>
</template>
<script>
import axios from 'axios';
import GuestLayout from '@/Layouts/Guest.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue'
import {Head } from '@inertiajs/inertia-vue3';
export default {
    props:{},
    components:{
      PrimaryButton,
GuestLayout,Head,TextInput,InputLabel
    },


    data() {
    return {
        form:{
            name:"",
            email:"",
            subject:"",
        }
    }
  },



   mounted() {
  
  },
  methods: {
  
  }
}
   

</script>
<style>



</style>