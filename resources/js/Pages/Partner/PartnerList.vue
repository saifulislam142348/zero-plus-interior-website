<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import NavLink from "../../Components/NavLink.vue";
import Pagination from "../../Components/Pagination.vue";

const props = defineProps({
    partners: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({});

const deleteAction = (partnerRef) => {
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
            form.delete(route('partner.delete', partnerRef), {
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: "Partner has been deleted successfully"
                    });
                }
            })

        }
    })
}

</script>

<template>
    <Head title="Partner" />
    <AdminPanelLayout>
        <template #header>Partners</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Partners</h5>
                <div class="action">
                    <NavLink :href="route('partner.create')" class="btn btn-sm btn-outline-primary">Add partner</NavLink>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Logo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(partner, i) in partners.data">
                            <td>{{ ++i }}</td>
                            <td>{{ partner.ref }}</td>
                            <td>{{ partner.name }}</td>
                            <td>{{ partner.email }}</td>
                            <td>{{ partner.phone }}</td>
                            <td>
                                <img v-if="partner.logo" :src="partner.logo.src" alt="" class="img-thumbnail w-12">
                            </td>
                            <td>
                                <div class="action">
                                    <ul>
                                        <li>
                                            <Link :href="route('partner.edit', partner.ref)" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-edit"></i></Link>
                                        </li>
                                        <li>
                                            <button @click="deleteAction(partner.ref)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="partners"/>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
