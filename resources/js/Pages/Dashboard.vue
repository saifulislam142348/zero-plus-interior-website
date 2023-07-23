<script setup>
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import { Head } from "@inertiajs/vue3";

</script>

<template>
    <Head title="Dashboard" />

    <AdminPanelLayout title="Dashboard">
        <template #header>Dashboard</template>

        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    <h4>User list: Students</h4>
                </div>
                <div class="box-action">
                    <ul>
                        <li>
                            <a href="" class="btn btn-rounded btn-sm btn-outline-primary">
                                <i class="bx bx-search-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="btn btn-rounded btn-sm btn-outline-warning">
                                <i class="bx bx-filter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="btn btn-rounded btn-sm btn-outline-info">
                                <i class="bx bx-cloud-download"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in 9">
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </td>
                        <td>Md. Bellal Hossain</td>
                        <td>belalkhan.dev@gmail.com</td>
                        <td>0179867316{{ item }}</td>
                        <td>Student</td>
                        <td>
                            <div class="action">
                                <ul>
                                    <li>
                                        <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </AdminPanelLayout>
</template>
