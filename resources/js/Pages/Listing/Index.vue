<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing"> 
            
        </Listing>

        <div v-if="listings.data.length" class="w-full flex justify-center my-8">
            <Pagination :links="listings.links"></Pagination>
        </div>
    </div>
</template>

<script setup>
import Pagination from '@/Components/UI/Pagination.vue';
import Listing from '@/Pages/Listing/Index/Components/Listing.vue';
defineProps({
    listings: Object,
})
</script>