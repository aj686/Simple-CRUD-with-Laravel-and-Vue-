<script setup>
import { Head } from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Table from '@/Components/Table.vue';

const props = defineProps({
    stories: Array,
    count: Number,
});

</script>


<template>
    <Head title="New Dashboard" />
    <DashboardLayout :stories="stories"/>
</template>