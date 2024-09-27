<template>
<h1 class="text-3xl mb-4">Your Listings</h1>
<section class="mb-8">
    <RealtorFilters></RealtorFilters>
</section>
<section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings" :key="listing.id">
        <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
            <div>
                <div class="xl:flex items-center gap-2">
                    <Price :price="listing.price" class="text-2xl font-medium"></Price>
                    <ListingSpace :listing="listing" class="text-sm"></ListingSpace>
                </div>
                <ListingAddress :listing="listing"></ListingAddress>
            </div>
            <div class="flex items-center gap-1 text-gray-600 dark:border-gray-300">
                <Link class="btn-outline text-xs font-medium">Preview</Link>
                <Link class="btn-outline text-xs font-medium">Edit</Link>
                <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.destroy', {listing: listing.id})" as="button" method="delete">Delete</Link>
            </div>
        </div>
    </Box>
</section>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';
import Price from '@/Components/UI/Price.vue';
import ListingSpace from '@/Components/UI/ListingSpace.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';
import { list } from 'postcss';
import RealtorFilters from './Index/Components/RealtorFilters.vue';


defineProps({listings: Array})
</script>