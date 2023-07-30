<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import { ref } from 'vue';
import InputError from "../../Components/InputError.vue";

const previewImage = ref(null);

const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.value = e.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        previewImage.value = null
    }
}

const form = useForm({
    name: '',
    designation: '',
    description: '',
    photo: ''
});

const createLeader = () => {
    form.post(route('leader.create'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            previewImage.value = null;
            Swal.fire(
                'Success',
                'Leader has been stored successfully',
                'success'
            )
        }
    })
}

</script>

<template>
    <Head title="Leader Create" />
    <AdminPanelLayout>
        <template #header>Leaders</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Create leader</h5>
                <div class="action">
                    <NavLink :href="route('leader.index')" class="btn btn-sm btn-outline-primary">Leader list</NavLink>
                </div>
            </div>
            <div class="box-body pb-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <form @submit.prevent="createLeader">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="leader name">
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" v-model="form.designation" class="form-control" placeholder="leader designation">
                                <InputError class="mt-2" :message="form.errors.designation" />
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control form-control-textarea" v-model="form.description" placeholder="write...."></textarea>
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>
                            <div class="form-group mt-4">
                                <div class="file-upload-group">
                                    <div>
                                        <label>Leader photo</label>
                                        <input type="file" @change="onFileChange" class="form-control input-file" @input="form.photo = $event.target.files[0]">
                                    </div>
                                    <div class="preview-images" v-if="previewImage">
                                        <div class="image">
                                            <img :src="previewImage">
                                        </div>
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.photo" />
                                </div>
                            </div>
                            <div class="form-group mt-4 d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn-primary btn" :disabled="form.processing">Save</button>
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
