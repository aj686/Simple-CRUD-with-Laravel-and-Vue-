<script setup>
import { defineProps, defineEmits } from 'vue';
import { useForm} from '@inertiajs/vue3';
// import { watchEffect } from 'vue';

const props = defineProps({
    showModalAddStory: Boolean,
});

const emit = defineEmits(['close']);

// Form state
const form = useForm({
    title: null,
    content: null,
});

// Watch for changes
// watchEffect(() => props.showModalAddStory, (value) => {
//     if (value) {
//         form.title = '';
//         form.content = '';
//     }
// });

const saveStory = () => {
    form.post('/store', {
        preserveScroll: true,
        onSuccess: () => {
            emit('close');
            Inertia.visit('/newdashboard');
        },
    });
};

</script>   

<template>
    <Teleport to="body"> 
        <div v-if="showModalAddStory" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl w-full">
            <button 
                @click="emit('close')" 
                class="absolute top-3 right-3 text-gray-400 hover:bg-gray-200 rounded-lg p-2"
            >
                ✖
            </button>
            <div class="text-center">
                <!-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg> -->
                <h3 class="mb-5 text-lg font-normal text-gray-500">Add New Story</h3>
                <form @submit.prevent="saveStory()">
                    <input type="text" class="border border-gray-200 rounded-lg px-3 py-2.5 w-full mb-3" 
                        placeholder="Title" v-model="form.title">
                    <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>

                    <textarea class="border border-gray-200 rounded-lg px-3 py-2.5 w-full mb-3 h-60" 
                        placeholder="Content" v-model="form.content">
                    </textarea>
                    <div v-if="form.errors.content" class="text-red-500 text-sm">{{ form.errors.content }}</div>

                    <button type="submit" :disabled="form.processing" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg px-5 py-2.5">
                        Add
                    </button>
                    <button type="button" @click="emit('close')" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
        </div>
    </Teleport>
</template>