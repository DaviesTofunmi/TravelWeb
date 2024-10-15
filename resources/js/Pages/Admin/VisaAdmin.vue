<template>
    <div>
        <h1 class="text-center py-4">VISA ADMIN</h1>
        <!-- <div>
          <input v-model="name" type="text" placeholder="Name">
          <input v-model="desc" type="text" placeholder="Description">
          <input v-model="location" type="text" placeholder="Location">
          <input v-model="duration" type="text" placeholder="Duration">
          <input v-model="price" type="text" placeholder="Price">
          <input v-model="date" type="text" placeholder="Date">
          <button @click="addTour()">post</button>
      </div>
   -->




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
                                        First Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Last Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Country</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        State</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        City</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Destination</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Status</th>
                                        <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Companion</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(visa, index) in applications"
                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ visa.id }}</td>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                      
                                      <div class="flex" v-if="visa.status === 'pending'">
                                        <button type="button"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                            @click="approveVisa(index + 1)">Approve</button>
                                        <button  type="button"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                            @click="rejectVisa(index + 1)">Deny</button>
                                      </div>
                                      <button  v-else style="display: block;" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Solved</button>
                                    </td>
                                    <!-- <div v-if="editingUser === index">
        <div class="absolute left-96 bottom-8 h-56 ...">
          <input type="text" v-model="editedUser.name" />
          <input type="number" v-model="editedUser.age" />
          <input type="text" v-model="editedUser.StudentClass" />
          <button @click="saveEdit()">Save</button>
  
        </div>
      </div> -->
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <div class="py-9">
        <h1>Companions</h1>
       
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
                                        <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                        
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(comp, index) in companions"
                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
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
                                     
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                      
                                        <div class="flex" v-if="comp.status === 'pending'">
                                        <button type="button"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                            @click="approveComp( comp.id)">Approve</button>
                                        <button  type="button"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                            @click="denyComp(comp.id)">Deny</button>
                                      </div>
                                      <button  v-else style="display: block;" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Solved</button>
                                    </td>
                                    <!-- <div v-if="editingUser === index">
        <div class="absolute left-96 bottom-8 h-56 ...">
          <input type="text" v-model="editedUser.name" />
          <input type="number" v-model="editedUser.age" />
          <input type="text" v-model="editedUser.StudentClass" />
          <button @click="saveEdit()">Save</button>
  
        </div>
      </div> -->
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {


            id: "",
            first_name: "",
            last_name: "",
            email: "",
            country: "",
            state: "",
            city: "",
            destination: "",
            status: "",
            solved_btn:false,
            accept_btn:false,
            reject_btn:false,

        


            applications: [],
            companions: [],

            visaApplication: {},
            companions:{},
            applicationID:'',


        }
    },
    mounted() {
 

        // this.tours= JSON.parse(localStorage.getItem('tours')) || [];
        this.fetchApplications();
        
        
    
    },
    methods: {
     
        fetchApplications() {
    axios.get(route('fetch_all_applications'), this.visaApplication)
        .then((res) => {
            console.log(res);
            this.applications = res.data;

        })
        .catch((err) => {
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
// fetchCompanions(compId) {
//     axios.get(route('fetch_companions_by_id', {id: compId}))
//         .then((res) => {
//             console.log(res);
//             this.companions = res.data;

//         })
//         .catch((err) => {
//             console.log(err);
//         });
// },

        


        approveVisa(appID) {
            axios.get(route('approve_application', { id: appID }))
                .then((res) => {
                    console.log(appID);

                })
                .catch((err) => {
                    console.log(err);
                })
          
                this.fetchApplications();
        },
        rejectVisa(appID) {
            axios.get(route('reject_application', { id: appID }))
                .then((res) => {
                    console.log(res);

                })
                .catch((err) => {
                    console.log(err);
                });
                this.fetchApplications();
        },

        approveComp(compID){
            axios.get(route('approve_companion', { id: compID }))
                .then((res) => {
                    console.log(res);
                    this.companions.find((companion) => companion.id === compID).status = 'Approved';
    

                })
                .catch((err) => {
                    console.log(err);
                })
               this.companions

        },
        denyComp(compID){
            axios.get(route('deny_companion', { id: compID }))
                .then((res) => {
                    console.log(res);
                    this.companions.find((companion) => companion.id === compID).status = 'Denied';

                })
                .catch((err) => {
                    console.log(err);
                });

        },





solved(){
    this.solved_btn = true;
            this.accept_btn = false;
            this.reject_btn = false;
}


    }
}
</script>