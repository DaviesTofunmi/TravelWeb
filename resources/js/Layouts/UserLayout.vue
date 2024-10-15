<template>
    <nav class="py-7 bg-gray-900 "></nav>
    <div class="flex">
        <div class="w-2/12 text-white border-r-[1px] border-r-gray-800 bg-gray-900 h-screen">
         
            <ul class="text-[1vw] px-1 mt-8 space-y-3 ">
                <li class=" px-2 py-5 flex items-center h-8 rounded-sm  space-x-3 hover:bg-gray-700">
                    <i class="fa-solid fa-house"></i>
                    <a href="user_dashboard" >Dashboard</a>
                </li>
                <li class=" px-2 py-5 flex items-center h-8 rounded-sm  space-x-3 hover:bg-gray-700">
                    <i class="fa-solid fa-pen"></i>
                    <a href="user_application">Applications</a>
                </li>
                    <li class=" px-2 py-5 flex items-center h-8 rounded-sm  space-x-3 hover:bg-gray-700">
                        <i class="fa-solid fa-chart-simple"></i>
                    <a href="">Analytics</a>
                </li>
                    <li class=" px-2 py-5 flex items-center h-8 rounded-sm  space-x-3 hover:bg-gray-700">
                        <i class="fa-solid fa-users"></i>
                    <a href="">Customers</a>
                </li>
                    <li class=" px-2 py-5 flex items-center h-8 rounded-sm  space-x-3 hover:bg-gray-700">
                        <i class="fa-solid fa-circle-question"></i>
                    <a href="">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="w-full text-white bg-gray-900">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';



</script>