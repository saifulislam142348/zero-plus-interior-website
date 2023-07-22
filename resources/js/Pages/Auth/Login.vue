<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('admin.login.submit'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div id="login-wrap">
            <div class="login-box">
                <div class="login-header">
                    <div class="logo">
                        <h2>Zero Plus</h2>
                        <h3 class="fw-500">Welcome back! login</h3>
                    </div>
                </div>
                <div class="login-body">
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="bx bx-user"></i>
                                </div>
                                <TextInput id="email" type="text" class="form-control" v-model="form.email" autofocus autocomplete="username" placeholder="test@example.com" />
                            </div>
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="bx bxs-key"></i>
                                </div>
                                <TextInput id="password" type="password" class="form-control" v-model="form.password" placeholder="*******" autocomplete="current-password" />
                            </div>
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <div class="form-rem-pass">
                            <label>
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span>Remember Me</span>
                            </label>
                        </div>
                        <div class="form-submit">
                            <button class="btn btn-primary w-100 text-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Log in
                            </button>
                        </div>
                    </form>
                </div>
                <div class="login-footer text-center">
                    <p>Can't access your account? <a href="#">Contact Us</a></p>
                </div>
            </div>
        </div>
    </div>
</template>
