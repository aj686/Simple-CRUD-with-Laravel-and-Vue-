<script setup>
import NavLink from '@/Components/NavLink.vue';


</script>

<template>
    <aside class="w-64 h-screen bg-gray-900 text-white px-5">
      <nav class="mt-5 text-xl">
        <ul>
          <li class="mb-3 py-4">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
                class="text-white text-xl hover:text-gray-300 transition duration-300"
            >
                Dashboard
            </NavLink>
          </li>
          <li class="mb-3 py-4">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
                class="text-white text-xl hover:text-gray-300 transition duration-300"
            >
                Stories
            </NavLink>
          </li>
          <li class="mb-3 py-4">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
                class="text-white text-xl hover:text-gray-300 transition duration-300"
            >
                Profile
            </NavLink>
          </li>
          <li class="mb-3 py-4">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
                class="text-white text-xl hover:text-gray-300 transition duration-300"
            >
                Settings
            </NavLink>
          </li>
          
        </ul>
      </nav>
    </aside>
</template>



  