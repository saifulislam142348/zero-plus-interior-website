<script setup>
import {ref} from "vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import DialogModal from "@/Components/DialogModal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    contacts: {
        type: Object,
        default: () => ({})
    }
});


const deleteContact = (contactRef) => {
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
            form.delete(route('contact.delete', contactRef), {
                onSuccess: () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Contact has been deleted successfully'
                    });
                }
            })
        }
    })
}

</script>

<template>
    <Head title="Contact" />
    <AdminPanelLayout>
        <template #header>Contacts</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Contacts</h5>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(contact, i) in contacts.data">
                            <td>{{ i+1 }}</td>
                            <td>{{ contact.name }} <br>{{ contact.phone }}</td>
                            <td>{{ contact.email }}</td>
                            <td>{{ contact.message }}</td>
                            <td>{{ contact.formatted_created_at }}</td>
                            <td>
                                <div class="action">
                                    <ul>
                                        <li>
                                            <button @click="deleteContact(contact.ref)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="contacts"/>
            </div>
        </div>
    </AdminPanelLayout>
</template>

<style scoped>

</style>
