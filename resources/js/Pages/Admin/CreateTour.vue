<template>
  <div>
    <h1 class="text-red-300">Create Tour</h1>
    <form @submit.prevent="addTour" enctype="multipart/form-data">
        <input v-model="name" type="text" placeholder="Name">
        <input v-model="desc" type="text" placeholder="Description">
        <input v-model="location" type="text" placeholder="Location">
        <input v-model="duration" type="text" placeholder="Duration">
        <input v-model="price" type="text" placeholder="Price">
        <input v-model="date" type="text" placeholder="Date">
        <input type="file" @change="pickFile($event)">
        <button type="submit">post</button>
    </form>





    <div class="flex flex-col ">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 ">
          <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">S/N</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Description</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Price</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Location</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Duration</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Image</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(tour, index) in tours" class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{index + 1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ tour.name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ tour.desc }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ tour.price }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ tour.location }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ tour.duration }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ tour.image }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Edit</button>
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
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

export default{
    data(){
      return{

        name: "",
        desc: "",
        location: "",
        duration: "",
        price: "",
        image: null,
       

        tours:[],

        addTours: {},
       

      }
    },
    mounted(){
        console.log(this.name);
        // this.tours= JSON.parse(localStorage.getItem('tours')) || [];
        this.fetchTour();
    },
    methods:{

      pickFile(e){
        console.log(e.target.files[0]);
        this.image= e.target.files[0];
        
      },
          addTour(){
            // this.addTours={
            //   name: this.name,
            //   desc: this.desc,
            //   location: this.location,
            //   duration: this.duration,
            //   price: this.price,
            //   image: this.image
              
            // }

            let formData= new FormData();
            formData.append('name', this.name);
            formData.append('desc', this.desc);
            formData.append('location', this.location);
            formData.append('duration', this.duration);
            formData.append('price', this.price);
            formData.append('image', this.image);
            // console.log(this.addTours);
            // this.tours.push(this.addTours);
            // localStorage.setItem('tours', JSON.stringify(this.tours));

            axios.post(route('tour.create'), formData).then((res)=>{
              console.log(res);
              
            }).catch((err)=>{
              console.log(err);
              
            })

            this.name= "";
            this.desc= "";
            this.location= "";
            this.duration= "";
            this.price= "";
            this.image= null;

          
          },





          fetchTour(){
            axios.get(route('tour.fetch')).then((res)=>{
              console.log(res);
              this.tours = res.data;
              
            }).catch((err)=>{
              console.log(err);
              
            })
        }
        }
}
</script>

