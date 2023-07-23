<script setup>
import {Head} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
</script>

<template>
    <Head title="Dashboard" />
    <AdminPanelLayout>
        <template #header>Categories</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Categories</h5>
            </div>
            <div class="box-body"></div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
