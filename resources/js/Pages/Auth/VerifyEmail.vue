<template>
<div>You need to be verified!</div>
<div>
    <Link :href="route('verification.send')" class="text-indigo-400 " method="post" as="button">Resend verification email</Link>
</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>