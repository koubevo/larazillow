<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input type="text" placeholder="Price from" class="input-filter-l w-28" v-model="filterForm.priceFrom">
                <input type="text" placeholder="Price to" class="input-filter-r w-28" v-model="filterForm.priceTo">
            </div>

            <div class="flex flex-nowrap items-center">
                <select name="" id="" class="input-filter-l" v-model="filterForm.beds">
                    <option value="">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="6">6+</option>
                </select>
                <select name="" id="" class="input-filter-r" v-model="filterForm.baths">
                    <option value="">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="6">6+</option>
                </select>
            </div>

            <div class="flex flex-nowrap items-center">
                <input type="text" placeholder="Area from" class="input-filter-l w-28" v-model="filterForm.areaFrom">
                <input type="text" placeholder="Area to" class="input-filter-r w-28" v-model="filterForm.areaTo">
            </div>

            <button class="btn-normal py-0" type="submit">Filter</button>
            <button type="reset" @click="clear">Reset</button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({filters: Object})
const filterForm = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null
})

const filter = () => {
    filterForm.get(
        route('listing.index'),
        {
            preserveState: true,
            preserveScroll: true
        }
    )
}

const clear = () => {
    filterForm.priceFrom = '',
    filterForm.priceTo = '',
    filterForm.beds = '',
    filterForm.baths = '',
    filterForm.areaFrom = '',
    filterForm.areaTo = ''
    filter()
}
</script>