<template>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
        <Box v-if="listing.images.length" class="md:col-span-7 flex items-center w-full">
            <div class="grid grid-cols-2 gap-1">
                <img v-for="image in listing.images" :key="image.id" :src="image.src">
            </div>
        </Box>
        <EmptyState v-else class="w-full text-center text-gray-500">
            No Images
        </EmptyState>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold"></Price>
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-grey-50 text-sm" />
            </Box>
            <Box>
                <template #header>
                    Monthly Payment
                </template>
                <div>
                    <label class="label">Interest rate({{interestRate}}%)</label>
                    <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 mb-3 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    <label class="label">Duration({{duration}} years)</label>
                    <input v-model.number="duration" type="range" min="3" max="35" step="1" class="w-full h-4 mb-3 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">Your monthly Payment</div>
                        <Price :price="monthlyPayment" class="text-3xl"></Price>
                    </div>
                    
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total paid</div>
                            <div>
                                <Price :price="totalPaid" class="font-medium"></Price>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Principal paid</div>
                            <div>
                                <Price :price="listing.price" class="font-medium"></Price>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Interest paid</div>
                            <div>
                                <Price :price="totalInterest" class="font-medium"></Price>
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
            <MakeOffer v-if="user && !offerMade" @offer-updated="offer = $event" :listing-id="listing.id" :price="listing.price"></MakeOffer>
            <OfferMade :offer="offerMade" v-if="user && offerMade"></OfferMade>
        </div>
    </div>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue';
import Box from '@/Components/UI/Box.vue';
import ListingSpace from '@/Components/UI/ListingSpace.vue';
import Price from '@/Components/UI/Price.vue';
import {ref} from 'vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayments';
import MakeOffer from './Show/Components/MakeOffer.vue';
import OfferMade from './Show/Components/OfferMade.vue';
import {Link, usePage} from '@inertiajs/vue3'
import { computed } from 'vue'
import EmptyState from '@/Components/UI/EmptyState.vue';



const interestRate = ref(2.5)
const duration = ref(25)

const props = defineProps({
    listing: Object,
    offerMade: Object
})
const offer = ref(props.listing.price)

const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(offer, interestRate, duration)

const page = usePage()

const user = computed(
  () => page.props.user
)

</script>