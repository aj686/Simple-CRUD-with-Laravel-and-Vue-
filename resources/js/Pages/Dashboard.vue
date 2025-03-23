<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Table from '@/Components/Table.vue';
import Modal2 from '@/Components/Modal2.vue';


const props = defineProps({
    stories: Array,
    count: Number,
});

function addStory() {
    alert('Add story');
};

const showModal = ref(false);

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <!-- <div>
            <pre>{{ stories }}</pre>
        </div> -->

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg flex items-center justify-between"
                >
                    <div class="p-6 text-gray-900">
                        Your story
                    </div>
                    <!-- <PrimaryButton @click="addStory" label="Add Story" class="p-button p-button-primary mx-4">
                            Add New Story
                    </PrimaryButton>   -->
                    <Button @click="addStory" label="Add Story" class="p-button p-button-primary mx-4" severity="help"/>
                    <Button label="Help" severity="help" />
                </div>

                <div class="p-6">
                    <!-- Display total count -->
                    <h1 class="text-2xl font-bold mb-4">Total Stories: {{ count }}</h1>

                    <!-- Grid layout for stories -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <Card v-for="story in stories" :key="story.id" :story="story" />
                    </div>
                </div>

                <div class="p-6">
                    <Table :items="stories" />
                </div>
            </div>

            
        </div>
    
        
    </AuthenticatedLayout>
</template>
