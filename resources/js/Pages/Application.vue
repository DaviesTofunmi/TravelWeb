<template>

    <div>

        <h1 class=" p-6">All applications</h1>
        <div class="flex ml-4  w-[82vw] flex-col ">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 ">
                            <thead>
                                <tr>
                                 
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        First Name</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Last Name</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Email</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Country</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        State</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        City</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Destination</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Status</th>
                                        <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Companions</th>

                                </tr>
                            </thead>
                            <tbody class="text-white">
                                <tr v-for="(visa, index) in applications" 
                                    class="">
                               
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ visa.first_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.last_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.country }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.state }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.city }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.destination }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ visa.status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            <button @click="this.fetchApplicationById(visa.id)" class="text-yellow-300">preview</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex ml-4  w-[82vw] pt-20 flex-col ">
        <h1 class="p-2">Companions</h1>
       
        <div class="flex flex-col ">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 ">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        S/N</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Relationship</th>
                                        <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Id</th>
                                        <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Status</th>
                                   
                                        
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(comp, index) in companions"
                                    class=" border-b-[1px] border-gray-700  ">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ index +1 }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ comp.comp_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ comp.relationship }}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ comp.transaction_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ comp.status }}</td>
                                     
           
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>
</template>

<script>
import axios from "axios";
import UserLayout from "../Layouts/UserLayout.vue";
export default {
    layout: UserLayout,
    data() {
        return {
            
            applications: [],
            visaApplication: {},
            companions:[],
            travel_comps:{},
            applicationID:'',

        }
    },
    mounted() {
        this.fetchUserApplications();
     
    },
    methods: {
        fetchUserApplications() {
            axios.get(route('user.fetch_applications'), this.visaApplication).then((res) => {
              
                this.applications = res.data.applications
                console.log(this.applications);


            }).catch((err) => {
                console.log(err);

            });

        },
        fetchApplicationById(appID){
    axios.get(route('fetch_application_by_id', {id: appID}))
        .then((res) => {
            console.log(res.data.applications.transaction_id);
            this.applicationID=res.data.applications.transaction_id
            axios.post('/send-application-id', {
                application_id: this.applicationID
            })
            .then((response) => {
                console.log(response.data.companions, 'im companion');
                this.companions= response.data.companions
            })
            .catch((error) => {
                console.log(error);
            });

        })
        .catch((err) => {
            console.log(err);
        });
},


        // fetchUserCompanions(){
        //     axios.get(route('user.fetch_companions'), this.travel_comps).then((res) => {
              
        //       this.companions = res.data.userComp
        //       console.log(this.companions);


        //   }).catch((err) => {
        //       console.log(err);

        //   });


        // }
    }
}
</script>