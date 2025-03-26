<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stories: {
        type: Array,
    },

    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <h1 class="text-4xl">PulseMY</h1>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <div
                            id="docs-card"
                            class="bg-white dark:bg-black dark:text-white/80 rounded-lg shadow-lg lg:col-span-2 lg:row-span-2"
                        >
                            <div class="p-6">
                                <h2 class="text-2xl font-bold">Welcome to PulseMY</h2
                                >   
                                <p class="text-gray-600 dark:text-gray-400">
                                    PulseMY is a social media platform where you can share your life with others.
                                </p>    
                            </div>
                        </div>
                    </div>

                    <div>
                        <div v-for="story in stories" class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-4 mt-5">
                            <!-- Header -->
                            <div class="flex items-center space-x-4">
                                <img 
                                   src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="Profile" 
                                    class="w-10 h-10 rounded-full"
                                >
                                <div>
                                    <h3 class="font-semibold">John Doe</h3>
                                    <p class="text-sm text-gray-500">@johndoe · 2h</p>
                                </div>
                            </div>

                            <!-- Post Image -->
                            <div class="mt-2 h-full w-full bg-slate-500">
                                <img
                                    src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="Post Image"
                                    class="rounded-lg"
                                    @error="handleImageError"
                                />
                            </div>

                            <!-- Content -->
                            <p class="mt-2 text-gray-700">
                                Just sharing a great moment! #LifeIsGood 🌟
                            </p>

                            <!-- Buttons -->
                            <div class="flex justify-between items-center mt-3 text-gray-500">
                                <button class="flex items-center space-x-1 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 19.636a9 9 0 1112.728-12.728 9 9 0 01-12.728 12.728z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 7.5h1.5v5.25h-1.5V7.5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 15.75h1.5v1.5h-1.5v-1.5z"></path>
                                    </svg>
                                    <span>12</span>
                                </button>

                                <button class="flex items-center space-x-1 hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.403 9-7.594 0-4.19-4.03-7.593-9-7.593s-9 3.403-9 7.593c0 2.146.946 4.086 2.485 5.476-.186.605-.474 1.588-.888 2.56a.75.75 0 001.05.987 12.084 12.084 0 002.813-2.25 9.167 9.167 0 003.54.314z"></path>
                                    </svg>
                                    <span>5</span>
                                </button>

                                <button class="flex items-center space-x-1 hover:text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 15l9-9m0 0h-5.25M16.5 6V11.25"></path>
                                    </svg>
                                    <span>3</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer> -->
            </div>
        </div>
    </div>
</template>
