<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import InputError from "@/Components/InputError.vue";
import {ref} from "vue";

const props = defineProps({
    project: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({});
const previewImage = ref(null);

const deleteAction = (photoId) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0284c7',
        cancelButtonColor: '#DC2626',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('project.photo.delete', photoId), {
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: "Photo has been deleted successfully"
                    });
                }
            })

        }
    })
}

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

const uploadForm = useForm({
    photo: '',
});

const submitPhoto = () => {
    uploadForm.post(route('project.upload.photo', props.project.ref), {
        preserveScroll: true,
        onSuccess: () => {
            uploadForm.reset();
            previewImage.value = null;
            Swal.fire(
                'Congratulation',
                'Project photo has been stored successfully',
                'success'
            )
        }
    })
}


</script>

<template>
    <Head title="Project" />
    <AdminPanelLayout>
        <template #header>Project Details</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Project: {{ project.title }}</h5>
                <div class="action">
                    <NavLink :href="route('project.index')" class="btn btn-sm btn-outline-primary">Project list</NavLink>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <td>{{ project.title }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ project.category ? project.category.name : '' }}</td>
                    </tr>
                    <tr>
                        <th>Client</th>
                        <td>{{ project.customer ? project.customer.name : '' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ project.status }}</td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td>{{ project.start_date }}, {{ project.end_date }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td v-html="project.description"></td>
                    </tr>
                </table>
            </div>
            <div class="box-footer text-center">
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Project's photos</h5>
            </div>
            <div class="box-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form @submit.prevent="submitPhoto" class="bg-gray-50 p-3">
                                <div class="form-group">
                                    <div class="file-upload-group">
                                        <div>
                                            <input type="file" @change="onFileChange" class="form-control input-file" @input="uploadForm.photo = $event.target.files[0]">
                                        </div>
                                        <div class="preview-images" v-if="previewImage">
                                            <div class="image">
                                                <img :src="previewImage">
                                            </div>
                                        </div>
                                        <InputError class="mt-2" :message="uploadForm.errors.photo" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="project-photos">
                    <div class="photo" v-for="photo in project.photos">
                        <img :src="photo.src" alt="" class="img-thumbnail">
                        <div class="action">
                            <button @click="deleteAction(photo.id)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
