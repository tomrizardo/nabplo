<template>
    <Head title="Reports" />

    <GuestLayout>
      <div class="w-screen min-h-[150rem] bg-gray-100">
   
    <div class="text-2xl font-bold text-center text-blue-500 mt-14 sm:text-4xl">
     REPORTS
    </div>

    <div class="mx-auto max-w-[80rem] mt-20 ">

 
    <div class="grid grid-cols-1 gap-6 px-6 mx-auto rounded-none md:px-0 md:py-4 md:border-gray-500 md:divide-x-2 md:shadow-md md:rounded-md md:gap-10 md:bg-white md:grid-cols-4">
             <div class="  bg-white md:bg-transparent min-h-[10rem] md:border-none border md:shadow-none md:rounded-none  shadow-md rounded-md max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 ">Total Lgu Registrants</div>
             <div class="text-4xl font-medium text-gray-700 bg-white md:bg-transparent ">{{this.count}}</div></div>
                <div class=" min-h-[10rem] bg-white md:bg-transparent  max-w-[60rem] md:border-none  md:shadow-none md:rounded-none   border shadow-md rounded-md  flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500">Total Participants</div>
             <div class="text-4xl font-medium text-gray-700 ">{{this.xapp_list.length}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem]  bg-white md:bg-transparent md:shadow-none md:rounded-none   md:border-none border shadow-md rounded-md  flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 ">Total Convention Paid</div>
             <div class="text-4xl font-medium text-gray-700 ">{{ countPaid(this.info) }}</div></div>
           
              <div class=" min-h-[10rem] md:border-none bg-white md:bg-transparent  md:shadow-none md:rounded-none   border shadow-md rounded-md   max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500">Total Pending </div>
             <div class="text-4xl font-medium text-gray-700 ">{{countPaylater(this.info)}}</div></div>
    </div>
  
  <div class="mt-6 mb-6 bg-white">
        <div class="container p-3 overflow-auto">
            <dataset
                v-slot="{ ds }"
                :ds-data="xapp_list"
                :ds-sortby="sortBy"
                :ds-filter-fields="{addr_region: onlineFilter}"
                :ds-search-in="['addr_region', 'addr_province', 'addr_municipality' ,'last_name','first_name']"
            >
                <div
                    class="flex flex-col grid-cols-12 sm:grid "
                    :data-page-count="ds.dsPagecount"
                >
        
                    <div class="col-span-12 m-3 md:col-span-6">
                        <dataset-search
                            class="w-full border-gray-300"
                            ds-search-placeholder="Search Region, Province, Municipality"
                        />
                    </div>
                    <div class="col-span-12 md:col-span-4">
                      <div class="flex items-center justify-between gap-4">


                                       <button  @click="download" class="inline-flex items-center justify-center w-full px-4 py-2 mt-4 mb-4 text-sm font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-600 border border-none rounded-md md:mb-0 hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray"> Export List</button>
                                       <button  @click="downloads" class="inline-flex items-center justify-center w-full px-4 py-2 mt-4 mb-4 text-sm font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-600 border border-none rounded-md md:mb-0 hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray">Export Groupings</button>
                      </div>
                    </div>
                    <!-- <div class="col-span-2 m-3">
                        <select
                            name=""
                            id="asd"
                            v-model="onlineFilter"
                            class="border-gray-300"
                        >
                            <option value="" selected>Select Service</option>
                            <option v-for="(service, i) in this.app_services" :key="i" :value="service.label">
                                {{ service.label }}
                            </option>
                        </select>
                    </div> -->
    <!-- <div class="col-span-2 m-3">
                        <select
                            name=""
                            id="asd"
                            v-model="onlineFilters"
                            class="border-gray-300"
                        >
                            <option value="" selected>Select Status</option>
                            <option v-for="(status, i) in this.statuses" :key="i" :value="status.label">
                                {{ status.label }}
                            </option>
                        </select>
                    </div> -->
                    <div class="hidden col-span-2 mt-3 ml-3 text-xs sm:block">
                        <dataset-show class="border-gray-300" />
                    </div>
                </div>
                <div class="hidden grid-cols-6 sm:grid ">
                    <div class="col-span-6">
                        <div class="p-2 shadow">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-white">
                                    <tr>
                                       
                                        <th
                                            v-for="(th, index) in cols"
                                            :key="th.field"
                                            :class="['sort', th.sort]"
                                            @click="click($event, index)"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
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
                                        <tr >
                                       <td
                                                class="px-6 py-4 text-sm whitespace-nowrap"
                                            >
                                                    <div class="flex">
                  <div class="mt-5">
                 <div class="text-xs font-bold text-gray-800 sm:text-sm">{{ row.first_name }} {{ row.mid_name }} {{ row.last_name }}  {{ row.ext_name }} </div>
                     <div class="text-xs font-normal text-gray-800 sm:text-xs">{{ row.position }} - {{row.nat_employment}}</div>
            
        <div class="mt-1 text-xs text-gray-800 sm:text-xs" v-if="row.others_department ==''">{{ row.department }}</div>
        <div class="mt-1 text-xs text-gray-800 sm:text-xs" v-else>{{ row.others_department }}</div>
        <div class="mt-1 text-xs text-gray-800 sm:text-xs">{{ row.contact_no }} - {{row.email}}</div>
                  </div>
                </div>   
                                            </td>
                                        <td class="px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="">
                 <div class="text-xs font-bold text-gray-800 sm:text-sm">{{ row.addr_municipality }}</div>
                     <div class="text-xs text-gray-800 sm:text-xs">{{ row.addr_province }}</div>
            
        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full sm:text-xs">
          {{ row.addr_region }}
        </span>
                  </div>
                </div>
              </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                 <div class="flex items-center">
                  <div class="">
                 <div class="px-2 text-sm" :class="{'bg-greens text-white font-semibold rounded-full text-xs inline-flex' : row.paid =='PAID',  'bg-yellow-500 text-white font-semibold rounded-full text-xs inline-flex' : row.paid =='PAY LATER' }">{{row.paid}} </div>
                     <div class="text-xs font-semibold text-gray-800 sm:text-xs" v-if="row.membr_type =='RENEWAL'"> Member since {{ row.membr_since }}</div>
            
       
        <div class="mt-1 text-xs text-gray-800 sm:text-xs" >{{ row.membr_type }}</div>
                  </div>
                </div>   
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                      {{new Date(row.created_at).toLocaleString('en-US', {
      month: '2-digit',
      day: '2-digit',
      year: 'numeric', 
      hour: 'numeric',
      minute: 'numeric',
      hour12: true
    })}}
                                            </td>
                                            <!-- <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.count_per_lgu }}
                                            </td>
                                          -->
                                           
                                        </tr>
                                    </template>
                                </dataset-item>
                            </table>
                        </div>

    

                    </div>
                    
                </div>
                 <div class="p-2 shadow sm:hidden ">
                            <table class="min-w-full divide-y divide-gray-300 ">
                                <thead class="bg-white">
                                    <tr >
                                        
                                       
                                        <th
                                            v-for="(th, index) in col"
                                            :key="th.field"
                                            :class="['sort', th.sort]"
                                            @click="click($event, index)"
                                            class="px-6 py-3 font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-200 text-md"
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

                                        
                                        <tr  >
                                       
                                            <!-- <td
                                                class="px-6 py-4 whitespace-nowrap" @click="toggle(row.doc_description)" :class="{ opened: opened.includes(row.doc_description)}"
                                            > -->
                                               <td
                                                class="px-6 py-2 font-semibold whitespace-nowrap"

                                             
                                            >
                                                 
                                            </td>
                                        
                                        </tr>
                                         <div >
                                            <div class="block px-6 py-6 bg-white rounded-md shadow-md">

                                              <div class="">
                                                <div class="flex items-center justify-between">

                                                <div class="font-semibold text-md">

                                                   {{row.addr_municipality}}
                                                </div>
               <div class="text-xs text-gray-800">{{ row.addr_province }}</div>
                                                </div>
            
        <!-- <span class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full sm:text-xs">
          {{ row.addr_region }}
        </span>
                                         -->
                                           
                                                     <div class="mt-2 text-xs text-start">
                                             <span class="inline-flex px-1 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full ">
          {{ row.addr_region }}
        </span>
                                                   </div>
                                                        </div>
                                  

                                                 <div class="flex items-center justify-between mt-2 text-xs">
                                                
                                                     <div class="text-sm font-semibold text-end">
                                                    {{row.first_name}}  {{row.mid_name}}  {{row.last_name}}
                                                   </div>
                                                   
                                                </div>

                                                 <div class="flex items-center justify-between mt-2 text-xs">
                                             
                                                     <div class="text-xs break-words text-end">
                                                    {{row.position}} - {{row.nat_employment}}
                                                   </div>
                                                   
                                                </div>
                                                 <div class="flex items-center justify-between mt-2 text-xs ">
                                             
                                                     <div class="break-words ">
                                                    {{row.department}}
                                                   </div>
                                                   
                                                </div>

                                                      <div class="flex items-center justify-between mt-2 text-xs ">
                                             
                                                     <div class="">
                                                    {{row.contact_no}} - {{row.email}}
                                                   </div>
                                                     
                                                   
                                                   
                                                </div>
                                                      <div class="flex items-center justify-between mt-2 text-xs ">
                                             
                                                                   <div class="px-2 text-xs" :class="{'bg-greens text-white font-semibold rounded-full text-xs inline-flex' : row.paid =='PAID',  'bg-yellow-500 text-white font-semibold rounded-full text-xs inline-flex' : row.paid =='PAY LATER' }">{{row.paid}} </div>

                                                   
                                                </div>
                                                      <div class="flex items-center justify-between mt-2 text-xs ">
                                             
                                                     <div class="break-words ">
                                                  {{row.membr_type}}
                                                   </div>
                                                   
                                                </div>
                                                      <div class="flex items-center justify-between mt-2 text-xs " v-if="row.membr_type=='RENEWAL'">
                                             
                                                     <div class="break-words ">
                                                Member Since  {{row.membr_since}}
                                                   </div>
                                                   
                                                </div>

                                                          <div class="flex items-center justify-between mt-2 text-xs " v-if="row.membr_type=='RENEWAL'">
                                             
                                                     <div class="break-words ">
                                                Register Date :     {{new Date(row.created_at).toLocaleString('en-US', {
      month: '2-digit',
      day: '2-digit',
      year: 'numeric', 
      hour: 'numeric',
      minute: 'numeric',
      hour12: true
    })}}
                                                   </div>
                                                   
                                                </div>

                                                        </div>
                                           

                                                  
                                              <!-- <tr >
                                                
        <td class=" whitespace-nowrap">{{row.xforapproval}}</td>
          <td class="px-3 py-2 whitespace-nowrap">{{row.xforcompletion}}</td>
          <td class="px-3 py-2 whitespace-nowrap">{{row.xpending}}</td>
 <td class="px-3 py-2 whitespace-nowrap">{{row.xtotal}}</td>

          
        </tr> -->
        
      </div>
      
                                    </template>
                                </dataset-item>
                            </table>
                        </div>
                <div class="flex justify-between align-items-center">
                    <dataset-info class="p-2 mb-md-0" />
                    <dataset-pager class="flex p-2 space-x-3" />
                </div>
            </dataset>
        </div>
    </div>
        <!-- <div class="mt-10 mb-6 text-3xl font-bold text-blue-500">
            Survery Reports
        </div>
       <div class="bg-white rounded-md shadow-md mt-30 ">
        <div class="p-3 mx-auto text-xl font-semibold text-center text-blue-700">
                Is your BPLO separate dept/office?
        </div>
          <div class="grid grid-cols-2 gap-10 py-4 mx-auto bg-white border-gray-500 divide-x-2 ">
<div class="  min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 "> Yes</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.yes}} out of  {{this.total}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 "> No</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.no}} out of  {{this.total}}</div></div>
          </div>
           <hr class="px-3 mx-6 my-6 border-gray-300 ">
      <div class="p-3 mx-auto mt-6 text-xl font-semibold text-center text-blue-700">
               Which of the following offices does assessment for local business tax?
        </div>
          <div class="grid grid-cols-3 gap-10 py-4 mx-auto bg-white border-gray-500 divide-x-2 ">
<div class="  min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 "> Business Permits and Licensing Office</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.business}} out of  {{this.total}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 ">City Treasurers Office</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.treasurers}} out of  {{this.total}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 ">Others</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.others}} out of  {{this.total}}</div></div>
          </div>
           <hr class="px-3 mx-6 my-6 border-gray-300 ">
            <div class="p-3 mx-auto mt-6 text-xl font-semibold text-center text-blue-700">
                In setting up an Electronic Business One Stop Shop (e-BOSS), which of the following reform has not been implemented in your LGU?
        </div>
  <div class="grid grid-cols-4 gap-10 py-4 mx-auto bg-white border-gray-500 divide-x-2 ">
<div class="  min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Colocation of offices involved in BPLS </div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.ecoloc}} out of  {{this.total}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Integration of barangay clearance</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.eclear}} out of  {{this.total}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500 ">Adoption of online assest & payment </div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.adopt}} out of  {{this.total}}</div></div>
                <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Integration of FSIC in BPLS</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.efsic}} out of  {{this.total}}</div></div>
          </div>
          <hr class="px-3 mx-6 my-6 border-gray-300 ">
            <div class="p-3 mx-auto mt-6 text-xl font-semibold text-center text-blue-700">
     Which of the following session topics would you like to attend?
        </div>
  <div class="grid grid-cols-5 gap-10 py-4 mx-auto bg-white border-gray-500 divide-x-2 ">

             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Setting up an e-Boss</div>
             <div class="text-3xl font-medium text-gray-700 mt-7 ">{{this.onestop}} out of  {{this.total}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Integration of barangay clearance</div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.tclearance}} out of  {{this.total}}</div></div>
                <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Use of online payment facility </div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.tfacility}} out of  {{this.total}}</div></div>
               <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Integration of FSIC fees</div>
             <div class="mt-6 text-3xl font-medium text-gray-700">{{this.tfees}} out of  {{this.total}}</div></div>
             <div class="  min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-center text-blue-500">Use of electronic sign/official receipt </div>
             <div class="text-3xl font-medium text-gray-700 ">{{this.treceipt}} out of  {{this.total}}</div></div>
          </div>
        </div> -->
        
        </div>

     
        </div>
    
 
          
    </GuestLayout>
</template>
<script >
import {
    Dataset,
    DatasetItem,
    DatasetInfo,
    DatasetPager,
    DatasetSearch,
    DatasetShow,
} from "vue-dataset";
import { filterList } from "@/utilities/index.js";
import ExcelJS from "exceljs";
import GuestLayout from '@/Layouts/Guest.vue'

export default {
    props:{
      count:{type: Number, default: () => null },
         info:{type: Array, default: () => null },
          total:{type: Number, default: () => null },
          yes:{type: Number, default: () => null },
                no:{type: Number, default: () => null },
            paid:{type: Number, default: () => null },
              status:{type: Number, default: () => null },
                mempaid:{type: Number, default: () => null },
                 adopt:{type: Number, default: () => null },
                 ecoloc:{type: Number, default: () => null },
                 eclear:{type: Number, default: () => null },
                 efsic:{type: Number, default: () => null },
                 business:{type: Number, default: () => null },
                 treasurers:{type: Number, default: () => null },
                 others:{type: Number, default: () => null },
                 onestop:{type: Number, default: () => null },
                 tclearance:{type: Number, default: () => null },
                 tfacility:{type: Number, default: () => null },
                 tfees:{type: Number, default: () => null },
                 treceipt:{type: Number, default: () => null },
},
   
    components:{
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
         fileName: "participantsList",
        slides: 7,
         onlineFilters: "",
            xapp_list: this.info,
            // xapp_list: [],
            onlineFilter: "",
            cols: [
                 {
                    name: "Participant",
                    field: "last_name",
                    sort: "",
                },
                {
                    name: "Municipality",
                    field: "addr_region",
                    sort: "",
                },
                {
                    name: "Member Info",
                    field: "paid",
                    sort: "",
                },

                    {
                    name: "Registration Date",
                    field: "created_at",
                    sort: "",
                },

                // {
                //     name: "Municipality",
                //     field: "addr_municipality",
                //     sort: "",
                // },

                // {
                //     name: "LGU Count",
                //     field: "count_per_lgu",
                //     sort: "",
                // },
                

                
            ],

              col: [
                {
                    name: "Participants",
                    field: "addr_municipality",
                    sort: "",
                },
               ]
        };
    },
    


     methods: {

      async downloads() {
  const workbook = new ExcelJS.Workbook();
  const worksheet = workbook.addWorksheet("Data Sheet");

  const lguClassToGroup = {
    'HIGHLY URBANIZED': 'Group 1',
    'INDEPENDENT COMPONENT': 'Group 2',
    'COMPONENT': 'Group 3',
    'FIRST': 'Group 4',
    'SECOND': 'Group 4',
    'THIRD': 'Group 4',
    'FOURTH': 'Group 5',
    'FIFTH': 'Group 5',
    'SIXTH': 'Group 5',
  };

  // Mapping the data
  const dataToExport = this.xapp_list
    .map(item => ({
      Group: lguClassToGroup[item.lgu_class],
      Participants: `${item.first_name} ${item.mid_name} ${item.last_name}`,
  
      Municipality: item.addr_municipality,
      Lgu_Class: item.lgu_class,
      // }),
    }))
   .sort((a, b) => {
      // Compare Region first
      if (a.Group !== b.Group) {
        return a.Group.localeCompare(b.Group);
      }
      if (a.Lgu_Class !== b.Lgu_Class) {
        return a.Lgu_Class.localeCompare(b.Lgu_Class);
      }
      
      // If Region is the same, compare Province
      if (a.Participants !== b.Participants) {
        return a.Participants.localeCompare(b.Participants);
      }
      
      // If Province is the same, compare Municipality
      return a.Municipality.localeCompare(b.Municipality);
    });

  const desiredColumnNames = [
    "Group",
    "Lgu Class",

    "Participants",
    "Municipality",
 
    

    // ... add other column names here ...
  ];

  // Add header row
  const headerRow = worksheet.addRow(desiredColumnNames);
  headerRow.eachCell(cell => {
    cell.font = {
      bold: true,
      size: 14,
      color: { argb: 'FFFFFF' } // White text color
    };
    cell.fill = {
      type: 'pattern',
      pattern: 'solid',
      fgColor: { argb: '0577e2' } // Set background color of header cells
    };
  });
 // Add data rows with alternating row colors
  dataToExport.forEach((rowData, index) => {
    const row = worksheet.addRow(Object.values(rowData));
    const fillColor = index % 2 === 0 ? 'F2F2F2' : 'EAEAEA'; // Alternating row colors
    row.eachCell(cell => {
      cell.fill = {
        type: 'pattern',
        pattern: 'solid',
        fgColor: { argb: fillColor }
      };
    });
  });
    // Auto-fit column widths based on content length
  worksheet.columns.forEach(column => {
    let maxLength = 0;
    column.eachCell({ includeEmpty: true }, cell => {
      const contentLength = cell.value ? cell.value.toString().length : 0;
      maxLength = Math.max(maxLength, contentLength);
    });
    column.width = maxLength + 2; // Add some padding to the calculated width
  });

    // Apply borders to the table
  worksheet.eachRow(row => {
    row.eachCell(cell => {
      cell.border = {
        top: { style: 'thin' },
        left: { style: 'thin' },
        bottom: { style: 'thin' },
        right: { style: 'thin' }
      };
    });
  });

  // Generate a blob from the workbook and trigger a download
  const blob = await workbook.xlsx.writeBuffer();
// const currentDate = new Date().toISOString().replace(/[-:.]/g, ''); // Convert current date to a string without special characters
  const fileName = `NabploGroupings.xlsx`; // Use the g
  const link = document.createElement("a");
  link.href = URL.createObjectURL(new Blob([blob]));
  link.download = fileName;
  link.click();
  URL.revokeObjectURL(link.href);
},

async download() {
  const workbook = new ExcelJS.Workbook();
  const worksheet = workbook.addWorksheet("Data Sheet");

  // Mapping the data
  const dataToExport = this.xapp_list
    .map(item => ({
      Ref_No:item.ref_no,
      Region: item.addr_region,
      Province: item.addr_province,
      Municipality: item.addr_municipality,
      Lgu_Class: item.lgu_class,
      Participants: `${item.first_name} ${item.mid_name} ${item.last_name}`,
      Position: item.position,
      Nature_Employement: item.nat_employment,
      Executive_Name: item.exec_name,
      Contact_Number: item.contact_no,
      Email: item.email,
      Member_Type: item.membr_type,
      Member_Since: item.membr_since ?? '--',
      Paid: item.paid,
      Payment_Type: item.payment_type,
      Registered_Date: new Date(item.created_at).toLocaleString('en-US', {
        month: '2-digit',
        day: '2-digit',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true
      }),
    }))
    .sort((a, b) => {
      // Compare Region first
      if (a.Region !== b.Region) {
        return a.Region.localeCompare(b.Region);
      }
      
      // If Region is the same, compare Province
      if (a.Province !== b.Province) {
        return a.Province.localeCompare(b.Province);
      }
      
      // If Province is the same, compare Municipality
      return a.Municipality.localeCompare(b.Municipality);
    });

  const desiredColumnNames = [
    "Ref No",
    "Region",
    "Province",
    "Municipality",
    "Lgu Class",
    "Participants",
    "Position",
    "Nature Of Employment",
    "Executive Name",
    "Contact Number",
    "Email",
    "Membership",
    "Member Since",
    "Payment",
    "Payment Type",
    "Registered Date",
    

    // ... add other column names here ...
  ];

  // Add header row
  const headerRow = worksheet.addRow(desiredColumnNames);
  headerRow.eachCell(cell => {
    cell.font = {
      bold: true,
      size: 14,
      color: { argb: 'FFFFFF' } // White text color
    };
    cell.fill = {
      type: 'pattern',
      pattern: 'solid',
      fgColor: { argb: '0577e2' } // Set background color of header cells
    };
  });
 // Add data rows with alternating row colors
  dataToExport.forEach((rowData, index) => {
    const row = worksheet.addRow(Object.values(rowData));
    const fillColor = index % 2 === 0 ? 'F2F2F2' : 'EAEAEA'; // Alternating row colors
    row.eachCell(cell => {
      cell.fill = {
        type: 'pattern',
        pattern: 'solid',
        fgColor: { argb: fillColor }
      };
    });
  });
    // Auto-fit column widths based on content length
  worksheet.columns.forEach(column => {
    let maxLength = 0;
    column.eachCell({ includeEmpty: true }, cell => {
      const contentLength = cell.value ? cell.value.toString().length : 0;
      maxLength = Math.max(maxLength, contentLength);
    });
    column.width = maxLength + 2; // Add some padding to the calculated width
  });

    // Apply borders to the table
  worksheet.eachRow(row => {
    row.eachCell(cell => {
      cell.border = {
        top: { style: 'thin' },
        left: { style: 'thin' },
        bottom: { style: 'thin' },
        right: { style: 'thin' }
      };
    });
  });

  // Generate a blob from the workbook and trigger a download
  const blob = await workbook.xlsx.writeBuffer();
// const currentDate = new Date().toISOString().replace(/[-:.]/g, ''); // Convert current date to a string without special characters
  const fileName = `participantsList.xlsx`; // Use the g
  const link = document.createElement("a");
  link.href = URL.createObjectURL(new Blob([blob]));
  link.download = fileName;
  link.click();
  URL.revokeObjectURL(link.href);
},

        
           countPaid(data) {
      return data.filter(item => item.validation_status === 'VERIFIED').length;
    },
           countPaylater(data) {
      return data.filter(item => item.validation_status === 'PENDING').length;
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
};

</script>

<style>



.carousel__item {
  min-height: 200px;

  background-color: blue;
  color: var(--vc-clr-white);
  font-size: 100px;
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
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

</style>