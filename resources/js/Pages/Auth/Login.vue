<script setup>
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
    })).post(route('login'), {
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
                        <h2>Right Academy</h2>
                        <h3 class="fw-500">Welcome back! login</h3>
                    </div>
                </div>
                <div class="login-body">
                    <form action="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="bx bx-user"></i>
                                </div>
                                <input type="text" name="username" placeholder="Email or username" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="bx bxs-key"></i>
                                </div>
                                <input type="password" name="password" placeholder="********" class="form-control">
                            </div>
                        </div>
                        <div class="form-rem-pass">
                            <label>
                                <input type="checkbox" name="remember_me">
                                <span>Remember Me</span>
                            </label>
                            <a href="">Forgot Password</a>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
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
