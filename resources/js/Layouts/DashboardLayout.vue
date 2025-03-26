
<script setup>
import Sidebar from '@/Components/Dashboard/Sidebar.vue';
import Navbar from '@/Components/Dashboard/Navbar.vue';
import Card from '@/Components/Dashboard/Card.vue';
import Table from '@/Components/Table.vue';
import ModalAdd from '@/Components/Modal/ModalAdd.vue';
import { ref } from 'vue';

const props = defineProps({
    stories: Array
});

const showModalAddStory = ref(false);

const openModalAddStory = () => {
    showModalAddStory.value = true;
}

</script>

<template>
    <!-- Navbar -->
    <div class="flex-1">
        <Navbar />
    </div>
    
    <div class="flex relative">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Main Content Wrapper -->
        <div class=" flex flex-col p-6">
            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <Card title="Stories" count="1,250" />
                <Card title="Likes" count="45,000" />
                <Card title="Comments" count="3,500" />
                <Card title="Sessions" count="12,800" />
            </div>


            <div
                class="overflow-hidden bg-slate-100 shadow-sm sm:rounded-lg flex items-center justify-between mt-5"
            >
                <div class="p-6 text-gray-900">
                    Your story
                </div>

                <button @click="openModalAddStory" label="Add Story" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 mr-4">
                        Add New Story
                </button>

                <!-- Teleported ModalView Component -->
                <ModalAdd
                    :showModalAddStory="showModalAddStory" 
                    @close="showModalAddStory = false" 
                />
                
                <div v-if="$page.props.flash.message" class="alert">
                    {{ $page.props.flash.message }}
                </div>

            </div>

            <!-- Table (Placed after Cards) -->
            <div class="mt-6">
                <Table :items="stories" />
            </div>
            
        </div>
    </div>
</template>
