<template>
<h1 class="text-3xl mb-4">Your Listings</h1>
<section class="mb-8">
    <RealtorFilters :filters="filters"></RealtorFilters>
</section>
<section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings.data" :key="listing.id" :class="{'border-dashed': listing.deleted_at}">
        <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
            <div :class="{'opacity-25': listing.deleted_at}">
                <div class="xl:flex items-center gap-2">
                    <Price :price="listing.price" class="text-2xl font-medium"></Price>
                    <ListingSpace :listing="listing" class="text-sm"></ListingSpace>
                </div>
                <ListingAddress :listing="listing"></ListingAddress>
            </div>
            <div class="flex items-center gap-1 text-gray-600 dark:border-gray-300">
                <a class="btn-outline text-xs font-medium" :href="route('listing.show', {listing: listing.id})" target="_blank">Preview</a>
                <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.edit', { listing: listing.id })">Edit</Link>
                <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.destroy', {listing: listing.id})" as="button" method="delete" v-if="!listing.deleted_at">Delete</Link>
                <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.restore', {listing: listing.id})" as="button" method="put" v-if="listing.deleted_at">Restore</Link>
            </div>
        </div>
    </Box>
</section>
<section v-id="listings.data.length" class="w-full flex justify-center my-4">
    <Pagination :links="listings.links"></Pagination>
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
import Pagination from '@/Components/UI/Pagination.vue';


defineProps({
    listings: Object,
    filters: Object
    })
</script>