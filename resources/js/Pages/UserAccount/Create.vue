<template>
    <form @submit.prevent="register">
        <div class="md:w-1/2 mx-auto">
            <div class="mb-3">
                <label for="name" class="label">Name</label>
                <input type="text" id="name" class="input" v-model="form.name">
                <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
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
            <div class="mb-3">
                <label for="password_confirmation" class="label">Password Confirmation</label>
                <input type="password" id="password_confirmation" class="input" v-model="form.password_confirmation">
                <div class="input-error" v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</div>
            </div>
            <div>
                <button class="btn-primary w-full" type="submit">Create account</button>
                <div class="text-center mt-4">
                    <Link :href="route('login')" class="text-gray-500 text-sm">Already have an account? Login here!</Link>
                </div>
            </div>
        </div>
    </form>
    </template>
    
    <script setup>
    import { useForm, Link } from '@inertiajs/vue3';
    
    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null
    })
    const register = () => form.post(route('user-account.store'))
    </script>