<template>
    <header class="border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 bg-white w-full">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div class="text-lg font.medium">
            <Link :href="route('listing.index')">Listings</Link>
          </div>
          <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
            <Link :href="route('listing.index')">Larazillow</Link>
          </div>
          <div class="flex items-center gap-4" v-if="user">
            <Link>
              <div class="text-gray-500 relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                </svg>
                <span class="absolute bg-red-700 text-white text-xs rounded-xl px-1 bottom-2 left-2" v-if="notificationCount">
                  {{ notificationCount }}
                </span>
              </div>
            </Link>
            <Link :href="route('realtor.listing.index')" class="text-sm text-gray-500">{{ user.name }}</Link>
            <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
            
            <Link :href="route('logout')" method="DELETE" as="button">Logout</Link>
          </div>
          <div v-else class="flex items-center gap-4">
            <Link :href="route('user-account.create')">Register</Link>
            <Link :href="route('login')">Sign in</Link>
          </div>
        </nav>
      </div>
    </header>

    <main class="container mx-auto p-4 w-full">
      <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
        {{ flashSuccess }}
      </div>

      <slot></slot>
    </main>
</template>

<script setup>
    import {Link, usePage} from '@inertiajs/vue3'
    import { computed } from 'vue'

    const page = usePage()
    const flashSuccess = computed(
      () => page.props.flash.success,
    )

    const user = computed(
      () => page.props.user
    )

    const notificationCount = computed(
      () => Math.min(page.props.user.notificationCount, 9)
    )
    
</script> 