<template>
     <Head title="Search Business" />
        <GuestLayout>

 <div class="min-h-[100rem] " v-if="$page.props.auth.user.roles == '1'">


    <div class="mt-20 text-blues text-2xl font-bold p-4">
        USER SETTINGS
        
    </div>
           


  
                                                <div class="p-4 mb-4 text-sm text-green-800 transition ease-in-out rounded-lg bg-green-50" role="alert" v-if="messageS">
  <span class="font-medium">Roles Change Successfully</span> 
</div>
        <div>
               <div class="mt-6 mb-6 ">
        <div class="container p-3 overflow-auto">
            <dataset
                v-slot="{ ds }"
                :ds-data="xapp_list"
                :ds-sortby="sortBy"
               
               
              
            >
                <div
                    class="grid grid-cols-6"
                    :data-page-count="ds.dsPagecount"
                >
               
                     <div class="hidden col-span-6 mt-3">
                        <dataset-show class="border-gray-300" :ds-show-entries="selected" @changed="selected = $event" />
                    </div> 
                </div>
                <div class="grid grid-cols-6 max-w-4xl bg-white">
                    <div class="col-span-6">
                        <div class="hidden p-2 shadow sm:block">
                            <table class="w-full divide-y divide-gray-300 ">
                                <thead class="">
                                    <tr >
                                       
                                        <th
                                            v-for="(th, index) in cols"
                                            :key="th.field"
                                            :class="['sort', th.sort]"
                                            @click="click($event, index)"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                                        >
                                            {{ th.name }}
                                            <i
                                                class="float-right gg-select"
                                            ></i>
                                        </th>
                                    </tr>
                                </thead>
                                <dataset-item tag="tbody">
                                    <template #default="{row}">
                                        <tr   >
                                       
                                       
                                               <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.id }}
                                            </td>
                                         
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.last_name }}
                                            </td>
                                               <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                              {{ row.first_name }}
                                               
                                            </td>
                                          
                                         
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >  
                                     <select name="
                                     " 
                                     class="rounded-md border-gray-300"
                                     id="" v-model="row.verification">
                                     <option :value="0
                                     " disabled>Unverified
                                     </option >
                                           <option :value="1 
                                     ">Verify
                                       </option>
                              
                                     
                                     </select>
                                              
                                            </td>

                                
                                               <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                            <button @click="getResults(row)" class="rounded-md bg-blues  text-white text-sm w-15 h-5 px-2">UPDATE</button>

                                            </td>
                                          
                                        </tr>
              
      
                                    </template>
                                </dataset-item>
                            </table>
                        </div>
   
                    </div>
                </div>
                <div class="flex justify-between align-items-center max-w-4xl">
                      <dataset-info class="hidden p-2 text-xs sm:text-lg mb-md-0 text-start sm:block" />
                    <dataset-pager class="flex p-2 space-x-3" />
                </div>
            </dataset>
        </div>
    </div>


        </div>

</div>
    
        <div v-else  class="text-center text-3xl font-bold text-blues min-h-[50rem] mx-auto">
                <div class="m-auto mx-auto mt-20">
                        THIS PAGE IS FOR ADMINISTRATORS ONLY
                </div>
        </div>

        </GuestLayout>
</template>

<script>

import {Head } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {
    Dataset,
    DatasetItem,
    DatasetInfo,
    DatasetPager,
    DatasetSearch,
    DatasetShow,
} from "vue-dataset";
import { filterList } from "@/utilities/index.js";
import axios from 'axios';





export default {
    props:{
    
            //  all:{type: Array, default: () => null },
             users:{type: Array, default: () => null },

    },

    
    components:{
        Head,

    InputError,
InputLabel,
TextInput ,
        PrimaryButton,
     Dataset,
    DatasetItem,
    DatasetInfo,
    DatasetPager,filterList,

    DatasetSearch,
    DatasetShow,
GuestLayout,
    },
data(){
    return{

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
      xapp_list:this.users,
       
     active: false,
     activeClass: 'block',
     onlineFilter: "",
            cols: [
                {
                    name: "User ID",
                    field: "id",
                    sort: "",
                   
                },
  {
                    name: "Last Name",
                    field: "last_name",
                    sort: "",
                    
                },
                    {
                    name: "First Name",
                    field: "first_name",
                    sort: "",
                    
                },
               
                
                {
                    name: "Status",
                    field: "verification",
                    sort: "",
                    
                },
                

                    {
                    name: "Action",
                    field: "roles",
                    sort: "",
                    
                },

                
            ],
   
}
},

    methods: {

        

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


          filterList,
        click(event, i) {
            let toset;
            const sortEl = this.cols[i];
            if (!event.shiftKey) {
                this.cols.forEach((o) => {
                    if (o.field !== sortEl.field) {
                        o.sort = "";
                    }
                });
            }
            if (!sortEl.sort) {
                toset = "asc";
            }
            if (sortEl.sort === "desc") {
                toset = event.shiftKey ? "" : "asc";
            }
            if (sortEl.sort === "asc") {
                toset = "desc";
            }
            sortEl.sort = toset;
        },





       
},


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