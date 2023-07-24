<script setup>
import {Head} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
</script>

<template>
    <Head title="Partner" />
    <AdminPanelLayout>
        <template #header>Partners</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Partners</h5>
                <div class="action">
                    <NavLink :href="route('partner.create')" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-plus"></i></NavLink>
                </div>
            </div>
            <div class="box-body"></div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
