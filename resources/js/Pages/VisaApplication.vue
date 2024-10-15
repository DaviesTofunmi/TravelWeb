<template>
  <!--
      This example requires updating your template:
  
      ```
      <html class="h-full bg-white">
      <body class="h-full">
      ```
    -->
  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
        alt="Your Company" />
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Visa Application</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div class="space-y-3" action="#" method="POST">
        <div>
          <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
          <div class="mt-2">
            <input v-model="first_name" id="first_name" name="first_name" type="text" autocomplete="text"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>
        <div>
          <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
          <div class="mt-2">
            <input v-model="last_name" id="last_name" name="last_name" type="text" autocomplete="text"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input v-model="email" id="email" name="email" type="email" autocomplete="email"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>
        <div>
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
          <div class="mt-2">
            <input v-model="country" id="country" name="country" type="text" autocomplete="text"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>
        <div>
          <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
          <div class="mt-2">
            <input v-model="state" id="state" name="state" type="text" autocomplete="text"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>
        <div>
          <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
          <div class="mt-2">
            <input v-model="city" id="city" name="city" type="text" autocomplete="text"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>


        <div>
          <label for="destination" class="block text-sm font-medium leading-6 text-gray-900">Destination</label>


          <div class="mt-2">
            <input v-model="destination" id="destination" name="destination" type="text" autocomplete="text"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>
        <div>
          <label for="travel_companion" class="block text-sm font-medium text-gray-700">Are there other persons
            traveling with you?</label>
          <div class="mt-1 flex">
            <input @click="offCompForm()" type="radio" name="travel_companion" value="No" v-model="travel_companion_no"
              class="focus:ring-indigo-500 h-4 w-4 text-blue-600 border-gray-300">
            <label for="travel_companion-no" class="ml-3 block text-sm font-medium text-gray-700">No</label>
          </div>
          <div class="mt-1 flex">
            <input @click="onCompForm()" type="radio" name="travel_companion" value="Yes" v-model="travel_companion_yes"
              class="focus:ring-indigo-500 h-4 w-4 text-blue-600 border-gray-300">
            <label for="travel_companion-yes" class="ml-3 block text-sm font-medium text-gray-700">Yes</label>
          </div>

<!-- COMPANION DETAILS -->
            <table v-if="travel_companion.length > 0">
              <thead>
                <th>S/N</th>
                <th>Name</th>
                <th>Relationship</th>
                <th>Action</th>
              </thead>
              <tbody>
                <tr v-for="(companion, i) in travel_companion">
                  <td>{{ i+1 }}</td>
                  <td>{{ companion.comp_name }}</td>
                  <td>{{ companion.relationship }}</td>
                  <td><button>Del</button></td>
                </tr>
              </tbody>
            </table>

        </div>
        <div id="companionForm" class="hidden">
          <div>
            <label for="comp_name" class="block text-sm font-medium leading-6 text-gray-900">Companion's Name</label>
            <div class="mt-2">
              <input v-model="comp_name" id="comp_name" name="comp_name" type="text" autocomplete="text"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
          <div>
            <label for="relationship" class="block text-sm font-medium leading-6 text-gray-900">Relationship</label>
            <div class="mt-2">
              <input v-model="relationship" id="relationship" name="relationship" type="text" autocomplete="text"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
          <div>
            <label for="relationship" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input v-model="comp_email" id="comp_email" name="comp_email" type="text" autocomplete="text"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>
          <button class="bg-red-200"@click="saveComp()">Save</button>

        </div>

        <div>
          <button @click="createVisa()" 
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Apply</button>
        </div>
      </div>
      <!--   
        <p class="mt-10 text-center text-sm text-gray-500">
          Not a member?
          {{ ' ' }}
          <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
        </p> -->
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      first_name: '',
      last_name: '',
      country: '',
      destination: '',
      email: '',
      state: '',
      city: '',
      travel_companion: [],
      travel_companion_no: false,
      travel_companion_yes: false,
      companionForm: null,
      comp_name: '',
      relationship: '',
      comp_email: '',
      addComp: {},
      createForm:{}
    }
  },
  mounted() {

    this.companionForm = document.getElementById('companionForm')
  },
  methods: {
    createVisa(){
      this.createForm={
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email,
        country: this.country,
        state: this.state,
        city:this.city,
        destination:this.destination,
        travel_companion:this.travel_companion,

      }
      axios.post(route('visaForm.create'), this.createForm).then((res)=>{
              console.log(res);
              alert('Application sent');
              
              
            }).catch((err)=>{
              console.log(err);
              
            })
            

      console.log(this.createForm);
      this.first_name='',
      this.last_name='',
      this.country= '',
      this.destination= '',
      this.email='',
      this.state='',
      this.city= ''
      


    },

    onCompForm() {

      this.companionForm.style.display = 'block'



    },

    offCompForm() {

      this.companionForm.style.display = 'none'
    },

    saveComp() {
      this.addComp = {
        comp_name: this.comp_name,
        relationship: this.relationship,
        comp_email: this.comp_email
        
      }
      
      this.travel_companion.push(this.addComp)
  
      console.log(this.addComp);
      this.comp_name=''
      this.relationship=''
      this.comp_email=''

    }
  }
}
</script>