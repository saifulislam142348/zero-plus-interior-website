<script setup>
import Header from "@/Layouts/Header.vue";
import Sidebar from "@/Layouts/Sidebar.vue";
</script>

<template>
    <div>
        <Header>
            <template #header>
                <slot name="header"/>
            </template>
        </Header>

        <div class="wrapper">
            <Sidebar/>

            <main class="main-content">
                <div class="content">
                    <slot/>
                </div>
            </main>
        </div>

    </div>
</template>
