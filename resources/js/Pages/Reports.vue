<template>
    <Head title="Reports" />

    <GuestLayout>
      <div class="w-screen min-h-[150rem] bg-gray-100">
   
    <div class="mt-12 text-2xl font-bold text-center text-blue-500 sm:text-4xl">
     REPORTS
    </div>

    <div class="mx-auto max-w-[80rem] mt-20 ">

     <div class="mb-6 text-3xl font-bold text-blue-500">
        DASHBOARD
     </div>
    <div class="grid grid-cols-4 gap-10 py-4 mx-auto bg-white border-gray-500 divide-x-2 rounded-md shadow-md">
             <div class="  min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 ">Total Lgu Registrants</div>
             <div class="text-4xl font-medium text-gray-700 ">{{this.perlgu}}</div></div>
             <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500 ">Total Convention Paid</div>
             <div class="text-4xl font-medium text-gray-700 ">{{this.paid}}</div></div>
              <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500">Total Membership Paid</div>
             <div class="text-4xl font-medium text-gray-700 ">{{this.mempaid}}</div></div>
              <div class=" min-h-[10rem]  max-w-[60rem] flex flex-col justify-items-start justify-evenly items-center"> <div class="text-xl font-medium text-blue-500">Total Pending </div>
             <div class="text-4xl font-medium text-gray-700 ">{{this.status}}</div></div>
    </div>
    <div class="mt-6 mb-6 bg-white">
        <div class="container p-3 overflow-auto">
            <dataset
                v-slot="{ ds }"
                :ds-data="xapp_list"
                :ds-sortby="sortBy"
                :ds-filter-fields="{region: onlineFilter}"
                :ds-search-in="['region', 'province', 'addr_municipality']"
            >
                <div
                    class="grid grid-cols-12"
                    :data-page-count="ds.dsPagecount"
                >
                    <div class="col-span-6 m-3">
                        <dataset-search
                            class="w-full border-gray-300"
                            ds-search-placeholder="Search Region, Province, Municipality"
                        />
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
                    <div class="col-span-2 mt-3">
                        <dataset-show class="border-gray-300" />
                    </div>
                </div>
                <div class="grid grid-cols-6">
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
                                        <tr>
                                       
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.region }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.province }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.addr_municipality }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap"
                                            >
                                                {{ row.count_per_lgu }}
                                            </td>
                                         
                                           
                                        </tr>
                                    </template>
                                </dataset-item>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between align-items-center">
                    <dataset-info class="p-2 mb-md-0" />
                    <dataset-pager class="flex p-2 space-x-3" />
                </div>
            </dataset>
        </div>
    </div>

        <div class="mt-10 mb-6 text-3xl font-bold text-blue-500">
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
        </div>
        
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

import GuestLayout from '@/Layouts/Guest.vue'

export default {
    props:{
      perlgu:{type: Number, default: () => null },
         report:{type: Array, default: () => null },
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
        slides: 7,
         onlineFilters: "",
            xapp_list: this.report,
            // xapp_list: [],
            onlineFilter: "",
            cols: [
                {
                    name: "Region",
                    field: "region",
                    sort: "",
                },
                {
                    name: "Province",
                    field: "province",
                    sort: "",
                },

                {
                    name: "Municipality",
                    field: "addr_municipality",
                    sort: "",
                },

                {
                    name: "LGU Count",
                    field: "count_per_lgu",
                    sort: "",
                },
                

                
            ],
        };
    },
    


     methods: {
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