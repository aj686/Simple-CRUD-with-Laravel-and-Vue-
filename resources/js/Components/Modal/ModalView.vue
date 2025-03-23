<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    showModalView: Boolean,
    itemId: Number,
    itemTitle: String,
    itemContent: String
});

const emit = defineEmits(['close']);
</script>

<template>
  <Teleport to="body"> 
    <div v-if="showModalView" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
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
              <h3 class="mb-5 text-lg font-normal text-gray-500">View Detail</h3>
              <div>
                <!-- <pre>{{ itemId }}</pre> -->
            </div>
              <form action="">
                <input type="text" class="border border-gray-200 rounded-lg px-3 py-2.5 w-full mb-3" placeholder="ID" :value="itemId" disabled>
                <input type="text" class="border border-gray-200 rounded-lg px-3 py-2.5 w-full mb-3" placeholder="Title" :value="itemTitle" disabled>
                <textarea class="border border-gray-200 rounded-lg px-3 py-2.5 w-full mb-3 h-60" placeholder="Content" :value="itemContent" disabled></textarea>
              </form>
              <button @click="emit('close')" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100">Cancel</button>
          </div>
      </div>
    </div>
  </Teleport>
</template>