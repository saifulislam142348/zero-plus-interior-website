<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import Pagination from "../../Components/Pagination.vue";

const props = defineProps({
    leaders: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({});

const deleteAction = (leaderRef) => {
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
            form.delete(route('leader.delete', leaderRef), {
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
        <template #header>Leader</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Leader</h5>
                <div class="action">
                    <NavLink :href="route('leader.create')" class="btn btn-sm btn-outline-primary">Add leader</NavLink>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Photo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(leader, i) in leaders.data">
                            <td>{{ ++i }}</td>
                            <td>{{ leader.ref }}</td>
                            <td>{{ leader.name }}</td>
                            <td>{{ leader.designation }}</td>
                            <td>
                                <img v-if="leader.photo" :src="leader.photo.src" alt="" class="img-thumbnail w-12">
                            </td>
                            <td>
                                <div class="action">
                                    <ul>
                                        <li>
                                            <Link :href="route('leader.edit', leader.ref)" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-edit"></i></Link>
                                        </li>
                                        <li>
                                            <button @click="deleteAction(leader.ref)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="leaders"/>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
