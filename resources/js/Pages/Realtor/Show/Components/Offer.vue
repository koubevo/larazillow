<template>
<Box>
    <template #header>Offer #{{ offer.id }}</template>
    <section class="flex items-center justify-between">
        <div>
            <Price :price="offer.amount" class="text-xl"></Price>
            <div class="text-gray-500">Difference <Price :price="difference"></Price></div>
            <div class="text-gray-500 text-sm">Made by Kkk</div>
            <div>Made on {{ madeOn }}</div>
        </div>
        <div>
            <Link class="btn-outline text-xs font-medium" as="button">Accept</Link>
        </div>
    </section>
</Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';
import Price from '@/Components/UI/Price.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'
const props = defineProps({
    offer: Object,
    listingPrice: Number
})

const difference = computed(
    () => props.offer.amount - props.listingPrice
)

const madeOn = computed(
    () => new Date(props.offer.created_at).toLocaleDateString()
    )
</script>