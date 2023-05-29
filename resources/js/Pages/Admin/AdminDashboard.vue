<template>
     <Head title="Search Business" />
        <GuestLayout>

 test

        </GuestLayout>
</template>

<script>

import {Head } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/StaffAuth.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import axios from 'axios';





export default {
    props:{
    
    articles:{type: Array, default: () => null },
        
    },

    
    components:{
        Head,

    InputError,
InputLabel,
TextInput ,
        PrimaryButton,
 
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