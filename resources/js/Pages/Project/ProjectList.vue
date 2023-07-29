<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import Pagination from "../../Components/Pagination.vue";

const props = defineProps({
    projects: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({});

const deleteAction = (projectRef) => {
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
            form.delete(route('project.delete', projectRef), {
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: "Project has been deleted successfully"
                    });
                }
            })

        }
    })
}

</script>

<template>
    <Head title="Project" />
    <AdminPanelLayout>
        <template #header>Projects</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Projects</h5>
                <div class="action">
                    <NavLink :href="route('project.create')" class="btn btn-sm btn-outline-primary">Add project</NavLink>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Thumbnail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(project, i) in projects.data">
                            <td>{{ ++i }}</td>
                            <td>
                                <Link :href="route('project.show', project.ref)">{{ project.ref }}</Link>
                            </td>
                            <td>{{ project.title }}</td>
                            <td>{{ project.category ? project.category.name : '' }}</td>
                            <td>{{ project.customer ? project.customer.name : '' }}</td>
                            <td><span :style="{ color: getStatusColor(project.status) }">{{ project.status.toUpperCase() }}</span></td>
                            <td>
                                <img v-if="project.thumbnail" :src="project.thumbnail.src" alt="" class="img-thumbnail w-12">
                            </td>
                            <td>
                                <div class="action">
                                    <ul>
                                        <li>
                                            <Link :href="route('project.edit', project.ref)" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-edit"></i></Link>
                                        </li>
                                        <li>
                                            <button @click="deleteAction(project.ref)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="projects"/>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
