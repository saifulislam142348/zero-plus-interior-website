<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import { ref } from 'vue';
import InputError from "../../Components/InputError.vue";
import Editor from "@tinymce/tinymce-vue";

const previewImage = ref(null);

const props = defineProps({
    categories: {
        type: Array,
    },
    clients: {
        type: Array,
    },
    partners: {
        type: Array,
    },
    statuses: {
        type: Array,
    }
})

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
    category_id: '',
    client_id: '',
    partner_id: '',
    title: '',
    description: '',
    status: 'pending',
    location: '',
    start_date: '',
    end_date: '',
    thumbnail: '',
});

const createProject = () => {
    form.post(route('project.create'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            previewImage.value = null;
            Swal.fire(
                'Congratulation',
                'Projects has been stored successfully',
                'success'
            )
        }
    })
}

</script>

<template>
    <Head title="Project Create" />
    <AdminPanelLayout>
        <template #header>Projects</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Create project</h5>
                <div class="action">
                    <NavLink :href="route('project.index')" class="btn btn-sm btn-outline-primary">Project list</NavLink>
                </div>
            </div>
            <div class="box-body pb-4">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <form @submit.prevent="createProject">
                            <div class="form-group">
                                <label for="">Project title</label>
                                <input type="text" v-model="form.title" class="form-control" placeholder="project title">
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select v-model="form.category_id" class="form-control">
                                            <option value="">Select category</option>
                                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.client_id" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Client</label>
                                        <select v-model="form.client_id" class="form-control">
                                            <option value="">Select client</option>
                                            <option v-for="client in clients" :value="client.id">{{ client.name }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.client_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Partner</label>
                                <select v-model="form.partner_id" class="form-control">
                                    <option value="">Select partner</option>
                                    <option v-for="partner in partners" :value="partner.id">{{ partner.name }}</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.partner_id" />
                            </div>
                            <div class="form-group">
                                <label for="">Project location</label>
                                <input type="text" v-model="form.location" class="form-control" placeholder="project location">
                                <InputError class="mt-2" :message="form.errors.location" />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Project start date</label>
                                        <input type="date" v-model="form.start_date" class="form-control">
                                        <InputError class="mt-2" :message="form.errors.start_date" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Project end date</label>
                                        <input type="date" v-model="form.end_date" class="form-control">
                                        <InputError class="mt-2" :message="form.errors.end_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Project Status</label>
                                <select v-model="form.status" class="form-control">
                                    <option v-for="status in statuses" :value="status" v-text="status.toUpperCase()"></option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.status" />
                            </div>
                            <div class="form-group">
                                <label for="">Project Details</label>
                                <Editor
                                    api-key="0pkrrft4y03r3s7a5hnx51vj8p8yhzy2pzwfhdozv7ck5dkn"
                                    :init="{
                                         height: 350,
                                         menubar: false,
                                         plugins: [
                                           'advlist autolink lists link image charmap print preview anchor',
                                           'searchreplace visualblocks code fullscreen',
                                           'insertdatetime media table paste code help wordcount'
                                         ],
                                         toolbar:
                                           'undo redo | formatselect | bold italic backcolor | \
                                           alignleft aligncenter alignright alignjustify | \
                                           bullist numlist outdent indent | removeformat | help'
                                       }"
                                    v-model="form.description"
                                />
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>
                            <div class="form-group mt-4">
                                <div class="file-upload-group">
                                    <div>
                                        <label>Project thumbnail</label>
                                        <input type="file" @change="onFileChange" class="form-control input-file" @input="form.thumbnail = $event.target.files[0]">
                                    </div>
                                    <div class="preview-images" v-if="previewImage">
                                        <div class="image">
                                            <img :src="previewImage">
                                        </div>
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.thumbnail" />
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
