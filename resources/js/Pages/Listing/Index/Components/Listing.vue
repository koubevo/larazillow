<template>
    <Box>
        <div>
            <Link :href="route('listing.show', { listing: listing.id })">
                <div class="flex items-center">
                    <Price :price="listing.price" class="text-2xl font-bold"></Price>
                    <div class="ms-3 text-xs text-gray-500">
                        <Price :price="monthlyPayment"></Price> pm
                    </div>
                </div>
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-sm" />
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', { listing: listing.id })">Edit</Link>
        </div>
    </Box>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';
import Box from '@/Components/UI/Box.vue';
import ListingSpace from '@/Components/UI/ListingSpace.vue';
import Price from '@/Components/UI/Price.vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayments';

const props = defineProps({
    listing: Object
})

const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 25)

</script>