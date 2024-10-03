<template>
    <h1 class="text-3xl mb-4">Your Notifications</h1>
    <section v-if="notifications" class="text-gray-400">
        <div v-for="notification in notifications.data" :key="notification.id" class="border-b mb-4 border-gray-800 py-4 flex justify-between items-center">
            <div>
                <span v-if="notification.type === 'App\\Notifications\\OfferMade'">Offer <Price :price="notification.data.amount"/> for <Link :href="route('realtor.listing.show', {listing: notification.data.listing_id})" class="text-indigo-400">listing {{ notification.data.listing_id }}</Link> was made.</span>
            </div>
            <div>
                <Link v-if="!notification.read_at" class="btn-outline text-xs" :href="route('notification.seen', {notification: notification.id})" as="button" method="put">Mark as read</Link>
            </div>
        </div>
    </section>
    <EmptyState v-else>No notifications yet.</EmptyState>
    <section v-if="notifications.lenght" class="w-full flex justify-center">
        <Pagination :links="notifications.links"></Pagination>
    </section>
</template>

<script setup>
import EmptyState from '@/Components/UI/EmptyState.vue';
import Pagination from '@/Components/UI/Pagination.vue';
import Price from '@/Components/UI/Price.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    notifications: Object
})
</script>