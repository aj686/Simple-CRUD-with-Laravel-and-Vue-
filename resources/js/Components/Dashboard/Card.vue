<template>
    <div class="p-5 shadow-md rounded-lg flex flex-col justify-center bg-gray-900 text-white hover:bg-gray-800">
      <h3 class="text-2xl font-semibold">{{ title }}</h3>
      <p class="text-6xl font-bold pt-3">{{ count }}</p>
    </div>
  </template>
  
  <script setup>
  defineProps({
    title: String,
    count: String,
  });
  </script>
  