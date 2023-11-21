<template>
     <Head title="Exectuve Settings" />
        <GuestLayout>

          <div v-if="messageS" class="fixed w-full p-4 text-green-500 bg-green-100 text-md"> 
        {{message}}
    </div>
       <div class="flex flex-col justify-center min-h-screen py-6 bg-gray-100 sm:py-12">

         
  <div class="relative py-3 sm:max-w-7xl sm:mx-auto">
   
    <div class="absolute inset-0 transform -skew-y-6 shadow-lg bg-gradient-to-r from-teal-400 to-blue-500 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
      <h1 class="mb-8 text-3xl font-bold text-center">Executives</h1>

      
      <table class="w-full mb-8">
        <thead>
          <tr>
            <th class="p-2 border">Sort</th>
            <th class="p-2 border">Prefix</th>
            <th class="p-2 border">First Name</th>
            <th class="p-2 border">Mid Name</th>
            <th class="p-2 border">Last Name</th>
            <th class="p-2 border">Position</th>
            <th class="p-2 border">Picture</th>
            <th class="p-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in rows" :key="index">
            <td class="p-2 border">
              <TextInput v-model="row.sort"  :disabled="!row.isNew && !row.isEditing" class="block w-full mt-1" />
            </td>
            <td class="p-2 border">
              <TextInput v-model="row.prefix" :disabled="!row.isNew && !row.isEditing" class="block w-full mt-1" />
            </td>
            <td class="p-2 border">
              <TextInput v-model="row.first_name" :disabled="!row.isNew && !row.isEditing" class="block w-full mt-1" />
            </td>
            <td class="p-2 border">
              <TextInput v-model="row.mid_name" :disabled="!row.isNew && !row.isEditing" class="block w-full mt-1" />
            </td>
            <td class="p-2 border">
              <TextInput v-model="row.last_name" :disabled="!row.isNew && !row.isEditing" class="block w-full mt-1" />
            </td>
            <td class="p-2 border">
              <TextInput v-model="row.position" :disabled="!row.isNew && !row.isEditing" class="block w-full mt-1" />
            </td>
            <td class="p-2 border">
              <div class="flex items-center">
                <label for="image-upload" class="mr-3 cursor-pointer">
                  <div class="relative w-24 h-24 overflow-hidden rounded-md">
                    <img :src="row.signature_data_uri || 'http://via.placeholder.com/640x360'
" class="object-cover w-full h-full" />
                    <div class="absolute inset-0 flex items-center justify-center transition duration-300 bg-gray-800 bg-opacity-75 opacity-0 hover:opacity-100">
                      <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 20 20">
                        <path d="M9 11V2.5C9 1.7 8.3 1 7.5 1H2.5
C1.7 1 1 1.7 1 2.5V17.5C1 18.3 1.7 19 2.5 19H17.5C18.3 19 19 18.3 19 17.5V12.5C19 11.7 18.3 11 17.5 11H9ZM7.5 4.4C8.4 4.4 9.1 5.1 9.1 6V11.9H15C15.6 11.9 16.1 11.4 16.1 10.8V2.5C16.1 1.7 15.4 1 14.6 1H7.5C6.7 1 6 1.7 6 2.5V4.4H7.5ZM15.2 17.6H4.8V16H15.2V17.6Z" />
</svg>
</div>
</div>
</label>
<div class="relative">
<input id="image-upload" type="file" class="" @change="onFileChanges($event, row)" :disabled="!row.isNew && !row.isEditing" />
</div>
</div>
</td>
<td class="p-2 border">
<div class="flex justify-center space-x-2">
<PrimaryButton v-if="row.isNew" @click="saveRow(row)" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-500">Save</PrimaryButton>
<PrimaryButton v-if="row.isNew" @click="cancel(row)" class="px-4 py-2 text-white bg-gray-400 rounded-md hover:bg-gray-300">Cancel</PrimaryButton>
<PrimaryButton v-if="!row.isNew && !row.isEditing" @click="enableEditing(row)" class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-400">Edit</PrimaryButton>
<PrimaryButton v-if="row.isEditing && !row.isNew" @click="saveRow(row)" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-500">Save</PrimaryButton>
<PrimaryButton v-if="row.isEditing && !row.isNew" @click="cancelEditing(row)" class="px-4 py-2 text-white bg-gray-400 rounded-md hover:bg-gray-300">Cancel</PrimaryButton>
<PrimaryButton v-if="!row.isNew && !row.isEditing" @click="deleteRow(row)" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-400">Delete</PrimaryButton>
</div>
</td>
</tr>
</tbody>
</table>
<PrimaryButton @click="addNewRow" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-400">Add Row</PrimaryButton>
</div>

  </div>
</div>
 

        </GuestLayout>
</template>

<script>

import {Head } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/StaffAuth.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Articles from '@/Components/Admin/ArticleCards.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import axios from 'axios';





export default {
    props:{
    
      
          executive:{type: Array, default: () => null },
    },

    
    components:{
        Head,
Articles,
    InputError,
InputLabel,
TextInput ,
        PrimaryButton,
 
GuestLayout,
    },
data(){
    return{
   rows: this.executive,
      newRow: { 
        sort:"",
        prefix: "",
        first_name:"" ,
        mid_name:"",
        last_name:"",
        position:"",
        picture_filename:"",
        signature_data_uri:"",
        
        
        },
          form: this.$inertia.form({
           
                first_name: "",
                 last_name: "",
                  mid_name: "",
                    email:"",
                    password:"",
                    password_confirmation:"",
                    roles:"",
                holder:""
            }),


        hide:true,
        message:"",
            processing:false,
        showNo:false,
            keyword:"",
            messageS:false,

       
     active: false,
     activeClass: 'block',
     onlineFilter: "",
           
}
},

    methods: {
     addNewRow() {
      this.rows.push({ ...this.newRow, isNew: true, isEditing: true });
    },
    enableEditing(row) {
      row.isEditing = true;
    },
saveRow(row) {
  const formData = new FormData();
    formData.append('sort', row.sort);
    formData.append('prefix', row.prefix  || '');
  formData.append('first_name', row.first_name);
  formData.append('last_name', row.last_name);
  formData.append('mid_name', row.mid_name || '');
  formData.append('position', row.position);
  // formData.append('description', row.description);
  formData.append('picture_filename', row.picture_filename);
   
  
  if (row.isNew) {

    axios.post(this.route('saveExec'), formData)
      .then(response => {

        
        // Handle the response as needed
       const savedRow = {
              id: response.data.executive.id,
              sort: response.data.executive.sort,
              prefix: response.data.executive.prefix,
              last_name: response.data.executive.last_name,
              first_name: response.data.executive.first_name,
              mid_name: response.data.executive.mid_name,
              position: response.data.executive.position,
              signature_data_uri: response.data.executive.signature_data_uri,
            
         
              isNew: false,
              isEditing: false 
              // set isEditing to false for the saved row
};
this.rows.splice(this.rows.indexOf(row), 1, savedRow); 

 this.message= response.data.message,

         this.messageS = true;

                setTimeout(() => this.messageS = false, 3000);
      })
      .catch(error => console.log(error));
  } else {

     formData.append('id', row.id);
    axios.post(this.route('saveExec'), formData)
      .then(response => {

  this.message= response.data.message,

         this.messageS = true;

                setTimeout(() => this.messageS = false, 3000);
            
   
        row.isEditing = false; // set isEditing to false for the edited row
      })
      .catch(error => console.log(error));
    
  }
 
     
},
    cancelEditing(row) {
   
      row.isEditing = false;
    },
    cancel(row) {
     const index = this.rows.indexOf(row);
  if (index > -1) {
    this.rows.splice(index, 1);
  }
    row.isNew = false;
      row.isEditing = false;
    },
    saveNewRow(row) {
      row.isNew = false;
      row.isEditing = false;
    },
    deleteRow(row) {
     if (confirm("Are you sure you want to delete this row?")) {
    axios.delete(this.route("deleteExec", { id: row.id }))
      .then(response => {
           this.message= response.data.message,

         this.messageS = true;

                setTimeout(() => this.messageS = false, 3000);
        const index = this.rows.indexOf(row);
        this.rows.splice(index, 1); // remove the deleted row from the array
        axios.get(this.route("staff.executive")) // fetch the latest list of articles
          .then(response => {
       
          })
          .catch(error => console.log(error));
      })
      .catch(error => console.log(error));
  }
    },

  AddUser(){
        this.form.reset(
                      
                     
                        "last_name",
                        "first_name",
                        "mid_name",
                        "roles",
                        "email",
                        "password",
                        "password_confirmation",

                    
                    );
this.hide = !this.hide;
    },

onFileChanges(event, row) {
  if (event.target && event.target.files && event.target.files.length > 0) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = (e) => {
      const dataURI = e.target.result;
      if (row) {
        row.isEditing = true; // Enable editing for new rows
    
        // Convert data URI to text file
        const signatureFile = new File([dataURI], 'signature.txt', { type: 'text/plain' });
        row.picture_filename = signatureFile;
        row.signature_data_uri = dataURI;
      } else {
        console.error('Invalid row object:', row);
      }
    };
    
    reader.readAsDataURL(file);
  }
},

  submit() {


   
            this.hasErrors = false;

            this.error_fullname = '';

            this.form.post(this.route("adduser"), {
                  forceFormData: true,
                onFinish: () => {},
                  onError: (resp_data) => {
                    this.$refs.main.scrollTo(0, 0);
                  
                 },
                onSuccess: (resp_data) => {
                    const { ref_id} = resp_data.props;

                console.log(ref_id);

   

                    this.form.reset(
                      
                     
                        "last_name",
                        "first_name",
                        "mid_name",
                        "roles",
                        "email",
                        "password",
                        "password_confirmation",

                    
                    );
             
            this.$inertia.visit('users');
                },
        
            });
        },    
        
  showDetails() {
       this.active = !this.active;
    //    this.$forceUpdate();
    },
  showDetail(search) {
       search.active = !search.active;
    //    this.$forceUpdate();
    },
        getResults(id) {
       
    this.processing= true;
            axios
            .post(this.route('rolechange'), {
                'id': id.id,
                'verification':id.verification,
                
            }).then(response => {
             
               this.messageS = true;

                setTimeout(() => this.messageS = false, 3000);
            
                this.track_disabled = false;
         window.location.reload();

  
           }).catch(error => {
            
             
                if (error.response) {
                           this.alert.alert_type = 'error';
                 
                
                }
                
            });
               
   
                
        },






       
},
//  mounted() {
//     this.rows = this.articles.map((article) => ({
//       ...article,
//       isEditing: false,
//       isNew: false,
//     }));
//   },

    computed: {

  
         
        sortBy() {
            return this.cols.reduce((acc, o) => {
                if (o.sort) {
                    o.sort === "asc"
                        ? acc.push(o.field)
                        : acc.push("-" + o.field);
                }
                return acc;
            }, []);
        },
    },



}
</script>

<style>
.modal{
    background: rgba(82, 80, 80, 0.3);
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 3.5px );
-webkit-backdrop-filter: blur( 3.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );
}

.gg-select {
    box-sizing: border-box;
    position: relative;
    display: block;
    transform: scale(1);
    width: 22px;
    height: 22px;
}
.gg-select::after,
.gg-select::before {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 8px;
    height: 8px;
    left: 7px;
    transform: rotate(-45deg);
}
.gg-select::before {
    border-left: 2px solid;
    border-bottom: 2px solid;
    bottom: 4px;
    opacity: 0.3;
}
.gg-select::after {
    border-right: 2px solid;
    border-top: 2px solid;
    top: 4px;
    opacity: 0.3;
}
th.sort {
    cursor: pointer;
    user-select: none;
}
th.sort.asc .gg-select::after {
    opacity: 1;
}
th.sort.desc .gg-select::before {
    opacity: 1;
}
.pagination li a {
 display: block;
  text-decoration: none;
  color: #000;
  padding: 5px 10px;
  border: 1px solid #ddd;
  float: left;
}

 .pagination li a {
  -webkit-transition: background-color 0.4s;
  transition: background-color 0.4s
}
.pagination li.page-item.active {
  background-color: #0577e2;
  color: #fff;
}

.pagination li.page-item.active a {

  color: #fff;
}
.pagination li a:hover:not(.active) {
  background: #ddd;
}
</style>