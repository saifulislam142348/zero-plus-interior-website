<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import { ref } from 'vue';
import InputError from "../../Components/InputError.vue";

const props = defineProps({
    client: {
        type: Object,
        default: () => ({})
    }
});

const previewImage = ref(props.client.photo && props.client.photo.src ? props.client.photo.src : null);

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
    name: props.client.name,
    email: props.client.email,
    phone: props.client.phone,
    address: props.client.address,
    photo: ''
});

const Client = () => {
    form.post(route('client.edit', props.client.ref), {
        preserveScroll: true,
        onSuccess: () => {
            Toast.fire({
                icon: 'success',
                title: 'Client update successfully'
            });
        }
    })
}

</script>

<template>
    <Head title="Client Create" />
    <AdminPanelLayout>
        <template #header>Clients</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Edit client</h5>
                <div class="action">
                    <NavLink :href="route('client.index')" class="btn btn-sm btn-outline-primary">Client list</NavLink>
                </div>
            </div>
            <div class="box-body pb-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <form @submit.prevent="Client">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="client name">
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" v-model="form.email" class="form-control" placeholder="client email">
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" v-model="form.phone" class="form-control" placeholder="client phone">
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>
                            <div class="form-group">
                                <label for="">About client</label>
                                <input type="text" v-model="form.address" class="form-control" placeholder="client address">
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>
                            <div class="form-group mt-4">
                                <div class="file-upload-group">
                                    <div>
                                        <label>Client photo</label>
                                        <input type="file" @change="onFileChange" @input="form.photo = $event.target.files[0]" class="form-control input-file">
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
                                <button type="submit" class="btn-primary btn" :disabled="form.processing">Save changes</button>
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
