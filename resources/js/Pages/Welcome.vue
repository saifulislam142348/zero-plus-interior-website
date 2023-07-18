<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
});
</script>

<template>
    <Head title="Welcome" />

    <div>
        <Link :href="route('admin.login')">Log in</Link>
    </div>
</template>

<style>
</style>
