<script setup>
import {Head} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
</script>

<template>
    <Head title="Dashboard" />
    <AdminPanelLayout>
        <template #header>Partners</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Partners</h5>
            </div>
            <div class="box-body"></div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
