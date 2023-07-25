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
    categories: {
        type: Object,
        default: () => ({})
    }
});

const displayCategoryModal = ref(false);

const showCategoryModal = () => {
    displayCategoryModal.value = !displayCategoryModal.value
}

const form = useForm({
    name: '',
    description: ''
})

const createCategory = () => {
    form.transform(data => ({
        ...data
    })).post(route('category.create'), {
        onSuccess: () => form.reset(),
    });
}

const deleteCategory = (category_id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6d28d9',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('category.delete', category_id))
        }
    })
}

</script>

<template>
    <Head title="Category" />
    <AdminPanelLayout>
        <template #header>Categories</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Categories</h5>
                <div class="action">
                    <button @click="showCategoryModal" class="btn btn-sm btn-rounded btn-outline-primary"><i class="bx bx-plus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="category in categories.data">
                            <td>{{ category.id }}</td>
                            <td>{{ category.ref }}</td>
                            <td>{{ category.name }}</td>
                            <td>{{ category.description }}</td>
                            <td>
                                <div class="action">
                                    <ul>
                                        <li>
                                            <Link :href="route('category.edit', category.id)" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></Link>
                                        </li>
                                        <li>
                                            <button @click="deleteCategory(category.id)" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <Pagination :data="categories"/>
            </div>
        </div>

        <DialogModal :show="displayCategoryModal"  @close="displayCategoryModal = false">
            <template #title>
                Add Category
            </template>

            <template #content>
                <form @submit.prevent="submit">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="form.name" placeholder="category name">
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="" placeholder="write description...." v-model="form.description" class="form-control form-control-textarea"></textarea>
                    </div>
                </form>
            </template>

            <template #footer>
                <SecondaryButton @click="displayCategoryModal = false">Cancel</SecondaryButton>
                <PrimaryButton @click="createCategory" class="ml-3">Save</PrimaryButton>
            </template>
        </DialogModal>

    </AdminPanelLayout>
</template>

<style scoped>

</style>
