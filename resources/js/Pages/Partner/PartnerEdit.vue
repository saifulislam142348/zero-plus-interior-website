<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import { ref } from 'vue';
import InputError from "../../Components/InputError.vue";

const props = defineProps({
    partner: {
        type: Object,
        default: () => ({})
    }
});

const previewImage = ref(props.partner.logo && props.partner.logo.src ? props.partner.logo.src : null);

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
    name: props.partner.name,
    email: props.partner.email,
    phone: props.partner.phone,
    description: props.partner.description,
    logo: ''
});

const updatePartner = () => {
    form.put(route('partner.edit', props.partner.ref), {
        preserveScroll: true,
        onSuccess: () => {
            Toast.fire({
                icon: 'success',
                title: 'Partner update successfully'
            });
        }
    })
}

</script>

<template>
    <Head title="Partner Create" />
    <AdminPanelLayout>
        <template #header>Partners</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Edit partner</h5>
                <div class="action">
                    <NavLink :href="route('partner.index')" class="btn btn-sm btn-outline-primary">Partner list</NavLink>
                </div>
            </div>
            <div class="box-body pb-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <form @submit.prevent="updatePartner">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="partner name">
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" v-model="form.email" class="form-control" placeholder="partner email">
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" v-model="form.phone" class="form-control" placeholder="partner phone">
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>
                            <div class="form-group">
                                <label for="">About partner</label>
                                <textarea class="form-control form-control-textarea" v-model="form.description" placeholder="write about partner...."></textarea>
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>
                            <div class="form-group mt-4">
                                <div class="file-upload-group">
                                    <div>
                                        <label>Partner logo</label>
                                        <input type="file" @change="onFileChange" class="form-control input-file" @input="form.logo = $event.target.files[0]">
                                    </div>
                                    <div class="preview-images" v-if="previewImage">
                                        <div class="image">
                                            <img :src="previewImage">
                                        </div>
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.logo" />
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
