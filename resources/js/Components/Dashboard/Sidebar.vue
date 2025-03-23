<script setup>
</script>

<template>
    <aside class="w-64 h-screen bg-gray-900 text-white p-5">
      <h2 class="text-xl font-bold">Dashboard</h2>
      <nav class="mt-5 text-xl">
        <ul>
          <li class="mb-3 py-4"><router-link to="/" class="hover:text-gray-400">Home</router-link></li>
          <li class="mb-3 py-4"><router-link to="/story" class="hover:text-gray-400">Story</router-link></li>
          <li class="mb-3 py-4"><router-link to="/profile" class="hover:text-gray-400">Profile</router-link></li>
          <li class="mb-3 py-4"><router-link to="/analytics" class="hover:text-gray-400">Analytics</router-link></li>
        </ul>
      </nav>
    </aside>
</template>



  