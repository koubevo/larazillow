<template>
    <span>
        {{ listing.street }} {{ listing.city }} ${{ listing.price }}
    </span>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>