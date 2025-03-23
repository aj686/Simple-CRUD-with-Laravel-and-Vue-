
<script setup>
import Sidebar from '@/Components/Dashboard/Sidebar.vue';
import Navbar from '@/Components/Dashboard/Navbar.vue';
import Card from '@/Components/Dashboard/Card.vue';
import Table from '@/Components/Table.vue';

const props = defineProps({
    stories: Array
});

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
                <Card title="Users" count="1,250" />
                <Card title="Revenue" count="$45,000" />
                <Card title="Orders" count="3,500" />
                <Card title="Sessions" count="12,800" />
            </div>

            <!-- Table (Placed after Cards) -->
            <div class="mt-6">
                <Table :items="stories" />
            </div>
        </div>
    </div>

</template>