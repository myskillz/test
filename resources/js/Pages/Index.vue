<template>
<main class="flex">
 <!-- Sidebar -->
 <aside class="bg-gradient-to-b from-indigo-800 to-indigo-700 text-white h-screen w-1/6 overflow-auto shadow-xl">
        <div class="p-4">
            <h1 class="text-xl font-semibold mb-4 border-b border-sky-600 pb-2">Super Q</h1>
            <ul>
                <li class="mb-2"><a href="#" class="text-gray-300 hover:text-white ">- Test page  </a></li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class=" ml-2 p-4 ">
        <nav class="bg-white border-b border-gray-200 p-4 pl-0 shadow-md">
            <div class="flex items-center">
                <h1 class="text-xl font-semibold">Avrillo Conveyancing Technical Test                                                                  </h1>
                <div class="ml-auto">
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="mt-8">
            <!-- Your page content goes here -->
            <h2 class="text-2xl font-semibold mb-4">API response:</h2>
            <ul class="ml-2 bg-gray-100 border-2 shadow-lg rounded-lg p-4 pl-8 list-disc">
                <li v-for="item in quoteResults">
                    <blockquote class="text-sm italic text-gray-600 mb-2">{{ item }}</blockquote>
                </li>
            </ul>
            
            <button 
            class="text-sm mt-4 bg-blue-500  hover:bg-blue-500 text-white py-2 px-6 rounded transition duration-300 ease-in-out"
            :class="{'bg-gray-500 hover:bg-gray-500': isClicked}"
            @click="refresh()"
            :disabled="isClicked">
                {{ isClicked?'Loading':'Refresh'}}
            </button>
        </div>
    </div>
</main>
</template>




<script setup>
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps({
    results: Array,
});

const quoteResults  = ref(props.results);
const isClicked     = ref(false);

function refresh(){
    isClicked.value = true;
    axios({
        method: 'get',
        url: '/refresh',
        data: {
            loadlimit: '5',
        }
    }).then((response) => {
        let resp = response.data;
        if(resp.status === 'OK')
            quoteResults.value = resp.data;
        else
            alert('Error, try again');
        isClicked.value = false;
    })
}
</script>
