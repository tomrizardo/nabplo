<template>
  <div class="min-h-screen ">
    <div class="text-4xl font-bold p-10 min-h-[23rem] text-blues">
        Welcome, 
        <span class="capitalize">
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