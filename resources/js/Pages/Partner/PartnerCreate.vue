<script setup>
import {Head} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
</script>

<template>
    <Head title="Partner Create" />
    <AdminPanelLayout>
        <template #header>Partners</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Create partner</h5>
                <div class="action">
                    <NavLink :href="route('partner.index')" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-list-check"></i></NavLink>
                </div>
            </div>
            <div class="box-body pb-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="" class="form-control" placeholder="partner name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="" class="form-control" placeholder="partner name">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="phone" name="" class="form-control" placeholder="partner name">
                            </div>
                            <div class="form-group">
                                <label for="">About partner</label>
                                <textarea name="" class="form-control form-control-textarea" placeholder="write about partner...."></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label>Partner photo/logo</label>
                                <input type="file" name="" class="form-control input-file">
                            </div>
                            <div class="form-group mt-4 d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn-primary btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
