<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import { ref } from 'vue';
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    settings: {
        type: Object,
        default: () => ({})
    }
});


const form = useForm({
    phone: props.settings ? props.settings.phone : '',
    alternative_phone: props.settings ? props.settings.alternative_phone : '',
    email: props.settings ? props.settings.email : '',
    alternative_email: props.settings ? props.settings.alternative_email : '',
    address_line_1: props.settings ? props.settings.address_line_1 : '',
    office_time:  props.settings ? props.settings.office_time : '',
    office_weekend:  props.settings ? props.settings.office_weekend : '',
});

const submitSettings = () => {
    form.post(route('contact.settings'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            Swal.fire(
                'Success',
                'Setting has been changes successfully',
                'success'
            )
        }
    })
}

</script>

<template>
    <Head title="Contact settings" />
    <AdminPanelLayout>
        <template #header>Contact settings</template>
        <div class="box">
            <div class="box-header">
                <h5 class="title">Contact settings</h5>
            </div>
            <div class="box-body pb-4">
                <div class="row">
                    <div class="col-md-8">
                        <form @submit.prevent="submitSettings">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.phone" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.phone" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Alternative Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.alternative_phone" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.alternative_phone" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" v-model="form.email" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.email" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Alternative Email</label>
                                <div class="col-sm-8">
                                    <input type="email" v-model="form.alternative_email" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.alternative_email" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Office weekend</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.office_weekend" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.office_weekend" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Office Time</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.office_time" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.office_time" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Address Line</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model="form.address_line_1" class="form-control">
                                    <InputError class="mt-1" :message="form.errors.address_line_1" />
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
