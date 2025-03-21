<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    showModal: Boolean,
});

const emit = defineEmits(['close']);
</script>

<template>
  <Teleport to="body"> 
    <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
      <div class="bg-white rounded-lg shadow-md p-6 max-w-md w-full">
          <button 
              @click="emit('close')" 
              class="absolute top-3 right-3 text-gray-400 hover:bg-gray-200 rounded-lg p-2"
          >
              ✖
          </button>
          <div class="text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this product?</h3>
              <button @click="emit('close')" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg px-5 py-2.5">Yes, I'm sure</button>
              <button @click="emit('close')" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100">No, cancel</button>
          </div>
      </div>
    </div>
  </Teleport>
</template>
