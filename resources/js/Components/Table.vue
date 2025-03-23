<script setup>
import { defineProps, ref } from 'vue'
import Modal2 from './Modal2.vue'
import ModalUpdate from './Modal/ModalUpdate.vue';
import ModalView from './Modal/ModalView.vue';

// props - read data only but cannot access
const props = defineProps({
    items: Object // Receives one story object
});

const showModal = ref(false);
const showModalUpdate = ref(false);
const showModalView = ref(false);
const selectedItem = ref(null);

const openModal = (id) => {
    showModalView.value = true;
    selectedItem.value = props.items.find(item => item.id === id);
}



</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="i in items" :key="items.id">
                    <td class="px-6 py-4 whitespace-nowrap">{{ i.id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ i.title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!-- Open View Modal -->
                         <!-- Need to pass parameter id etc @click="viewStory(post.id) -->
                         <button 
                            @click="openModal(i.id)"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        >
                            View
                        </button>

                        <!-- <button 
                            @click="showModalView = true" 
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        >
                            View
                        </button> -->

                        <!-- Teleported ModalUpdate Component -->
                        <ModalView 
                            :showModalView="showModalView"  
                            :itemId="selectedItem?.id"  
                            :itemTitle="selectedItem?.title"
                            :itemContent="selectedItem?.content"
                            @close="showModalView = false" 
                        />

                        <!-- Open Edit Modal -->
                        <button b 
                            @click="showModalUpdate = true" 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >
                            Edit
                        </button>

                        <!-- Teleported ModalUpdate Component -->
                        <ModalUpdate :showModalUpdate="showModalUpdate" @close="showModalUpdate = false" />

                        <!-- Open Delete Modal -->
                        <button 
                            @click="showModal = true" 
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                        >
                            Delete
                        </button>

                        <!-- Teleported Modal Component -->
                        <Modal2 :showModal="showModal" @close="showModal = false" />
                        
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
