<template>
<form @submit.prevent="login">
    <div class="md:w-1/2 mx-auto">
        <div class="mb-3">
            <label for="email" class="label">Email (username)</label>
            <input type="text" id="email" class="input" v-model="form.email">
            <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
        </div>
        <div class="mb-3">
            <label for="password" class="label">Password</label>
            <input type="password" id="password" class="input" v-model="form.password">
            <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
        </div>
        <div>
            <button class="btn-primary w-full" type="submit">Login</button>
        </div>
    </div>
</form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email: null,
    password: null
})
const login = () => form.post(route('login.store'))
</script>