<template>
    <Box>
        <template #header>Upload New Images</template>
        <form @submit.prevent="upload">
            <section class="flex items-center gap-2 my-4">
                <input type="file" multiple @input="addFiles" class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 dark:file:bg-gray-800 file:font-medium file:hover:bg-gray-200 file:dark:hover:bg-gray-700 file:cursor-pointer file:mr-4">
                <button type="submit" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed" :disabled="!canUpload">Upload</button>
                <button type="reset" class="btn-outline ms-2" @click="reset">Reset</button>
            </section>
        </form>
    </Box>

    <Box class="mt-4" v-if="listing.images.length">
        <template #header>Current Listing Images</template>
        <section class="mt-4 grid grid-cols-3 gap-4">
            <div v-for="image in listing.images" :key="image.id" class="flex flex-col justify-between">
                <img :src="image.src" alt="rounded-md">
                <Link class="btn-outline text-sm mt-2" :href="route('realtor.listing.image.destroy', { listing: props.listing.id, image: image.id })" method="delete" as="button">Delete</Link>
            </div>
        </section>
    </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue'
import { router } from '@inertiajs/vue3';
import NProgress from 'nprogress'

const props = defineProps({listing: Object})
router.on('progress', (event) => {
    if(event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage /100) * 0.9)
    }
})

const form = useForm({
    images: []
})

const canUpload = computed(() => form.images.length)

const upload = () => {
    form.post(
        route('realtor.listing.image.store', { listing: props.listing.id}),
        {
            onSuccess: () => form.reset('images')
        }
    )
}

const addFiles = (event) => {
    for (const image of event.target.files) {
        form.images.push(image)
    }
}

const reset = () => form.reset('images')
</script>