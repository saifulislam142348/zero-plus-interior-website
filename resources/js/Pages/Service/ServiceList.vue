<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import Pagination from "../../Components/Pagination.vue";

const props = defineProps({
    services: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({});

const deleteAction = (serviceRef) => {
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
            form.delete(route('service.delete', serviceRef), {
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: "Client has been deleted successfully"
                    });
                }
            })

        }
    })
}

</script>

<template>
    <Head title="Client" />
    <AdminPanelLayout>
        <template #header>Service</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Service</h5>
                <div class="action">
                    <NavLink :href="route('service.create')" class="btn btn-sm btn-outline-primary">Add service</NavLink>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Thumbnail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(service, i) in services.data">
                            <td>{{ ++i }}</td>
                            <td>
                                <Link :href="route('service.show', service.ref)">{{ service.ref }}</Link>
                            </td>
                            <td>{{ service.title }}</td>
                            <td>{{ service.description }}</td>
                            <td>
                                <img v-if="service.photo" :src="service.photo.src" alt="" class="img-photo w-12">
                            </td>
                            <td>
                                <div class="action">
                                    <ul>
                                        <li>
                                            <Link :href="route('service.edit', service.ref)" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-edit"></i></Link>
                                        </li>
                                        <li>
                                            <button @click="deleteAction(service.ref)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="services"/>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
