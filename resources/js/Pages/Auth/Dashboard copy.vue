<template>
  <div class="min-h-screen ">
    <div class="text-4xl font-bold p-10 text-gray-700 min-h-[23rem]">
        Welcome, 
        <span>
          {{$page.props.auth.user.first_name}}  {{$page.props.auth.user.last_name}} 
        </span>
    </div>
    <!-- <div class="w-full h-full rounded-md">
    <img :src="$page.props.base_url + `public/img/logo/dsdh.png`"
    alt="" class="mx-auto">

    </div> -->
    <div>
        <!-- <div>
     <table>
      <thead>
        <tr>
          <th>Month</th>
          <th>File Uploaded</th>
          <th>Status</th>
          <th>Upload File</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(month, index) in months" :key="month.name">
          <td>{{ month.name }}</td>
          <td>{{ month.uploadedFile }}</td>
          <td>{{ month.status }}</td>
          <td>
            <input
              type="file"
              :disabled="isDisabled(index)"
              @change="onFileSelected($event, index)"
            />
          </td>
        </tr>
      </tbody>
    </table>
  </div> -->

  <div class="flex flex-wrap justify-center">
  <div class="w-full p-4 lg:w-1/3">
    <div class="px-6 py-4 bg-white rounded-lg shadow-lg">
      <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-800">January</h2>
        <p class="text-gray-600">Status: Uploaded</p>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex-1">
          <p class="text-gray-600">File uploaded:</p>
          <p class="font-bold text-gray-800">file-name.pdf</p>
        </div>
        <div>
          <input type="file" class="w-0 h-0 opacity-0" disabled>
          <button class="px-4 py-2 text-gray-600 bg-gray-300 rounded-lg cursor-not-allowed" disabled>Uploaded</button>
        </div>
      </div>
    </div>
  </div>

  <div class="w-full p-4 lg:w-1/3">
    <div class="px-6 py-4 bg-white rounded-lg shadow-lg">
      <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-800">February</h2>
        <p class="text-gray-600">Status: Uploaded</p>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex-1">
          <p class="text-gray-600">File uploaded:</p>
          <p class="font-bold text-gray-800">file-name.pdf</p>
        </div>
        <div>
          <input type="file" class="w-0 h-0 opacity-0" disabled>
          <button class="px-4 py-2 text-gray-600 bg-gray-300 rounded-lg cursor-not-allowed" disabled>Uploaded</button>
        </div>
      </div>
    </div>
  </div>


<div class="w-full p-4 lg:w-1/3">
    <div class="px-6 py-4 bg-white rounded-lg shadow-lg">
      <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-800">March</h2>
        <p class="text-gray-600">Status: Uploaded</p>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex-1">
          <p class="text-gray-600">File uploaded:</p>
          <p class="font-bold text-gray-800">file-name.pdf</p>
        </div>
        <div>
          <input type="file" class="w-0 h-0 opacity-0" disabled>
          <button class="px-4 py-2 text-gray-600 bg-gray-300 rounded-lg cursor-not-allowed" disabled>Uploaded</button>
        </div>
      </div>
    </div>
  </div>
  <div class="w-full p-4 lg:w-1/3">
    <div class="px-6 py-4 bg-white rounded-lg shadow-lg">
      <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-800">April</h2>
        <p class="text-gray-600">Status: Upcoming</p>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex">
          <p class="text-gray-600">File uploaded:</p>
       
        </div> 
        <div class="flex">
          <input type="file" class="w-full" :disabled="!isUploadEnabled('April')" @change="onFileUpload('2023-04-01', $event)">
          <button class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700" :disabled="!isUploadEnabled('April')">Upload</button>
        </div>
      </div>
    </div>
  </div>

  <div class="w-full p-4 lg:w-1/3">
      <div class="px-6 py-4 bg-white rounded-lg shadow-lg">
        <div class="mb-4">
          <h2 class="text-xl font-bold text-gray-800">May</h2>
          <p class="text-gray-600">Status: Upcoming</p>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex">
            <p class="text-gray-600">File uploaded:</p>
          </div>
          <div class="flex">
            <input type="file" class="w-full" :disabled="!isUploadEnabled('May')" @change="onFileUpload('2023-05-01', $event)">
            <button class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700" :disabled="!isUploadEnabled('May')" :class="{'text-gray-600 bg-gray-300 rounded-lg cursor-not-allowed' : isUploadEnabled}">Upload</button>
          </div>
        </div>
      </div>
   </div>
  <div class="w-full p-4 lg:w-1/3">
    <div class="px-6 py-4 bg-white rounded-lg shadow-lg">
      <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-800">June</h2>
        <p class="text-gray-600">Status: Upcoming</p>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex">
          <p class="text-gray-600">File uploaded:</p>
       
        </div>
        <div class="flex">
          <input type="file" class="w-full" :disabled="!isUploadEnabled(6)" @change="onFileUpload('2023-06-01', $event)">
          <button class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700" :disabled="!isUploadEnabled(6)"  :class="{'text-gray-600 bg-gray-300 rounded-lg cursor-not-allowed' : isUploadEnabled}">Upload</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ... and so on for the other months ... -->

</div>
    </div>
  </div>
</template>

<script>
import GuestLayout from "@/Layouts/AuthenticatedLayout.vue"
export default {
layout:GuestLayout,


  data() {
      const now = new Date();
    const currentMonth = now.getMonth() + 1;
    const months = [
      { name: "January", uploadedFile: "", status: "Not uploaded" },
      { name: "February", uploadedFile: "", status: "Not uploaded" },
      { name: "March", uploadedFile: "", status: "Not uploaded" },
      { name: "April", uploadedFile: "", status: "Not uploaded" },
      { name: "May", uploadedFile: "", status: "Not uploaded" },
      { name: "June", uploadedFile: "", status: "Not uploaded" },
      { name: "July", uploadedFile: "", status: "Not uploaded" },
      { name: "August", uploadedFile: "", status: "Not uploaded" },
      { name: "September", uploadedFile: "", status: "Not uploaded" },
      { name: "October", uploadedFile: "", status: "Not uploaded" },
      { name: "November", uploadedFile: "", status: "Not uploaded" },
      { name: "December", uploadedFile: "", status: "Not uploaded" },
    ];

    // Disable input for future months
    for (let i = currentMonth; i < 12; i++) {
      months[i].isDisabled = true;
    }

    return { months };
  
  },
  methods: {
    onFileUpload(index) {
      const input = event.target
      const file = input.files[0]
      this.months[index].file = file.name
      this.months[index].status = 'Uploaded'
    },
 
    

       isUploadEnabled(month) {
      const currentMonth = new Date().toLocaleString('default', { month: 'long' });
      return currentMonth === month;
    },
  }

}
</script>

<style>

</style>