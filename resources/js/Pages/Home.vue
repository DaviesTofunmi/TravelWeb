<style>
body{
    
   overflow-x: hidden;
}
.sect1 {
    /* background-image: url('../../images/port3.jpg');
    background-size: cover;
    background-position: 0rem;
    background-repeat: no-repeat; */
    color: white;
    overflow-x: hidden;
    background-color:rgb(48, 49, 50);
  
 


  
}
.sect1Cont{
 

    box-shadow: 200px -200px 200px 330px rgba(0, 0, 0, 0.54) inset 
}

.sect1_left {
    opacity: 1;
    animation: fade-out linear;
    animation-timeline: view();
    animation-range: exit
  

}
.sect1 img{

    transform-origin: bottom;
    animation: background-fade linear forwards;
    animation-timeline: view();
    animation-range: exit;
}

@keyframes fade-out {
    
    to {opacity: 0;}
}
@keyframes  background-fade {
    25%{opacity: 1; }
    85%, 100% {opacity: 0; scale: 2;  overflow-x: hidden; }
    
}



.sect2RightCardContent:focus-within p {
    display: block;

}
.sect2RightCard{
    animation: fade-in linear;
    animation-timeline: view();
    animation-range: start

}
@keyframes fade-in {
    25%{opacity: 0; }
    50%,100% {opacity: 1; }
}
</style>


<template>
    <div class="bg-[rgb(22,23,24)]">


        <div class="sect1  lg:w-90 h-screen">
            <img class="h-full w-full object-cover absolute" src="../../images/port3.jpg" alt="">
          <div class="sect1Cont relative   h-full w-full">
            <nav class="lg:flex py-8 justify-around gap-80 md:hidden sm:hidden">
                <div class="logo">
                    <img src="" alt="Logo">
                </div>
                <ul class="flex text-[0.9vw] gap-2">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a :href="route('VisaApplication')">Visa Application</a></li>
                    <li>About us</li>

                </ul>
                <div class="flex gap-2">
                    <button
                        class="lg: bg-[rgb(242,237,92)] rounded-sm w-[4.5vw] text-[0.9vw] text-black font-medium">Login</button>
                    <button
                        class="lg: bg-[rgba(0,0,0,0.26)] rounded-sm w-[4.5vw] text-[0.9vw] text-white font-medium">Register</button>
                </div>
            </nav>
            <div class="sect1_content flex justify-around gap-15  mt-32 ">
                <div class="sect1_left">
                    <h1 class="w-2/4 text-[rgb(252,252,252)]  text-[3.4vw]">
                        Fly Beyond Limits: PegiTour Tour Booking Experience
                    </h1>
                    <p class="lg: w-[40vw] text-[1vw] text-[rgb(189,189,190)]">Experience limitless travel possibilities
                        with PegiTour's innovative tour booking platform. Start your journey today?</p>
                </div>
                <div class="sect1_right">
                    <img src="" alt="content">

                </div>
            </div>
          </div>

        </div>
        <div class="sect2 p-9 bg-[rgb(22,23,24)] h-screen">
            <div class="sect2_content h-full">
                <div class="sect2_top place-content-center  h-1/3">
                    <div class="text-[rgb(242,237,92)] text-center text-[0.8vw]">
                        <span>@</span>
                        <span>How It Works</span>
                    </div>
                    <h1 class="text-center text-[1.4vw] mx-auto text-white w-[31vw]">Effortless Tour Booking Process:
                        Simplifying Your Travel Arrangements</h1>
                    <p class="text-white text-[0.8vw] text-center pt-1">Simplify Your Tour Booking Process Every Time.
                    </p>
                </div>
                <div class="sect2_bottom p-1 h-2/3">
                    <div class="sect2_bottom_content w-full flex gap-4 h-full">
                        <div class="sect2_left rounded-lg  w-1/2 h-full">
                            <!-- <video class="min-h-full bg-red-300" autoplay loop src="../../images/vid.mp4"></video> -->
                            <img class="h-full w-full rounded-lg" src="../../images/tour3.jpg" alt="">
                        </div>
                        <div class="sect2_right flex flex-col gap-3 w-1/2 h-full">
                            <div
                                class="sect2RightCard hover:bg-[rgb(34,36,37)] text-white p-3 h-1/3 w-full border-[1px] border-[rgb(48,48,49)] rounded-lg ">
                                <button class="sect2RightCardContent   w-full h-full">
                                    <div class="flex  mb-5  items-center justify-between">
                                        <h1 class=" text-[rgb(242,237,92)] font-bold text-[1.8vw]">01</h1>
                                        <i class="fa-solid fa-chevron-down  text-sm"></i>
                                    </div>
                                    <h3 class="pb-1 text-lg  text-left">
                                        Destination Research
                                    </h3>
                                    <p class="text-xs mb-1 text-left hidden  text-[rgb(112,113,113)]">Lorem, ipsum dolor
                                        sit amet consectetur adipisicing elit. Reprehenderit assumenda blanditiis
                                        deleniti minus nesciunt harum maxime sapiente obcaecati aperiam ipsum! Minima
                                        qui.</p>

                                </button>
                            </div>
                            <div
                                class="sect2RightCard hover:bg-[rgb(34,36,37)] text-white p-3 h-1/3 w-full border-[1px] border-[rgb(48,48,49)] rounded-lg ">
                                <button class="sect2RightCardContent   w-full h-full">
                                    <div class="flex  mb-5  items-center justify-between">
                                        <h1 class=" text-[rgb(242,237,92)] font-bold text-[1.8vw]">02</h1>
                                        <i class="fa-solid fa-chevron-down  text-sm"></i>
                                    </div>
                                    <h3 class="pb-1 text-lg  text-left">
                                        Tour Booking
                                    </h3>
                                    <p class="text-xs mb-1 text-left hidden  text-[rgb(112,113,113)]">Lorem, ipsum dolor
                                        sit amet consectetur adipisicing elit. Reprehenderit assumenda blanditiis
                                        deleniti minus nesciunt harum maxime sapiente obcaecati aperiam ipsum! Minima
                                        qui.</p>

                                </button>
                            </div>
                            <div
                                class="sect2RightCard hover:bg-[rgb(34,36,37)] text-white p-3 h-1/3 w-full border-[1px] border-[rgb(48,48,49)] rounded-lg ">
                                <button class="sect2RightCardContent   w-full h-full">
                                    <div class="flex  mb-5  items-center justify-between">
                                        <h1 class=" text-[rgb(242,237,92)] font-bold text-[1.8vw]">03</h1>
                                        <i class="fa-solid fa-chevron-down  text-sm"></i>
                                    </div>
                                    <h3 class="pb-1 text-lg  text-left">
                                        Visa Application
                                    </h3>
                                    <p class="text-xs mb-1 text-left hidden  text-[rgb(112,113,113)]">Lorem, ipsum dolor
                                        sit amet consectetur adipisicing elit. Reprehenderit assumenda blanditiis
                                        deleniti minus nesciunt harum maxime sapiente obcaecati aperiam ipsum! Minima
                                        qui.</p>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="sect3 lg: pl-9 pt-7 pr-7 pb-60 bg-[rgb(15,15,15)]">

            <span class="lg: text-[0.7vw] text-[rgb(236,231,89)]">@</span><span
                class="lg: text-[0.7vw]  text-[rgb(236,231,89)]">Recommendation</span>
            <h1 class=" mb-3 text-white w-1/3 font-medium text-[1.7vw]">
                Popular tours frequently picked by people near you.
            </h1>
            <div class="flex  w-full flex-wrap gap-3 h-[18vw] ">
                <TourCard />
            </div>
        </div>
    </div>
</template>
<script>
import TourCard from '../Components/TourCard.vue';

export default {
    components: {
        TourCard
    },
    data() {
        return {

        }
    }

}
</script>
