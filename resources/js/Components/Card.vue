<script setup>
// import Card from 'primevue/card';
// import Button from 'primevue/button';

import { defineProps } from 'vue';

const props = defineProps({
    story: Object // Receives one story object
});

</script>

<template>
    <!-- <Card style="width: 25rem; overflow: hidden">
        <template #header>
            <img alt="user header" src="https://primefaces.org/cdn/primevue/images/usercard.png" />
        </template>
        <template #title>Advanced Card</template>
        <template #subtitle>Card subtitle</template>
        <template #content>
            <p class="m-0">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione quam perferendis esse, cupiditate neque
                quas!
            </p>
        </template>
        <template #footer>
            <div class="flex gap-4 mt-1">
                <Button label="Cancel" severity="secondary" outlined class="w-full" />
                <Button label="Save" class="w-full" />
            </div>
        </template>
    </Card> -->
    <div class="border p-4 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">{{ story.title }}</h2>
        <p class="text-gray-600">{{ story.content }}</p>
        <p class="text-sm text-gray-500">By: {{ story.user?.name ?? 'Unknown' }}</p>
    </div>

</template>