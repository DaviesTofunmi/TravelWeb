<template>
    <div  v-for="(tour, index) in tours" class="lg:  text-white   w-[23vw] h-full">
       <img class="lg:  mb-3 rounded-md h-[15vw] w-full" :src="'storage/'+tour.image " alt="image">
       <div class="lg: flex items-center justify-between w-35  mb-4">
        <div class="lg: flex items-center gap-1">
            <p class="lg: text-[0.9vw]">{{ tour.name }}</p>
            <span class="lg: text-[1.2vw]">|</span>
            <p class="lg: text-[0.9vw]">{{ tour.location }}</p>
        </div>
        <p class="lg: text-[rgb(179,179,179)] text-[0.9vw]">{{ tour.duration }}</p>
        

       </div>
     <div class="flex items-center justify-between">
        <div>
        <p class="lg: text-[rgb(179,179,179)] text-[0.7vw]">Amount:</p>
        <p class="lg: font-bold text-[1.2vw]">{{tour.price}}</p>
       </div>
       <button @click="payment()"
       class="lg: bg-[rgb(242,237,92)] rounded-sm w-[4.5vw] text-[0.9vw] text-black font-medium">Book</button>
     </div>
    </div>
</template>
<script>
import axios from 'axios';


export default{
    data(){
        return{
            tours:[]

        }
    }, 
    mounted(){
        this.fetchTour();
        // this.tours= JSON.parse(localStorage.getItem('tours')) || [];
        console.log(this.tours);
        
    },
    methods:{
        fetchTour(){
            axios.get(route('tour.fetch')).then((res)=>{
              console.log(res);
              this.tours = res.data;
              
            }).catch((err)=>{
              console.log(err);
              
            })
        },

        payment(){
            axios.post(route('pay')).then((res)=>{
                console.log(res.data);
               const url= res.data.url[0].url
                window.location.href = url
                
            })
        }

        // fetchTourById(tourID) {
        //     axios.get(route('tour.fetchById', { id: tourID }))
        //         .then((res) => {
        //             console.log(tourID);
        //            const tourDetails=res.data
        //                   // Navigate to the tour details page
        //                   router.push({ name: 'tour-details', params: { tourDetails: this.tourDetails } });

        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         })
          
        // },
    }
    
}


</script>