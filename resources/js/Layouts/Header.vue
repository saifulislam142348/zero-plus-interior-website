<script setup>
    import Dropdown from "../Components/Dropdown.vue";
    import DropdownLink from "../Components/DropdownLink.vue";
</script>

<template>
    <header>
        <div class="apps">
            <div class="app-icon">
                <img src="@/assets/images/menus.svg" alt="">
            </div>
            <div class="app-brand">
                <h3>Zero Plus</h3>
            </div>
        </div>
        <div class="header-navs">
            <div class="page-title">
                <h5><slot name="header"/></h5>
            </div>
            <div class="nav-items">
                <div class="nav-item">
                    <span class="nav-icon" data-bs-toggle="tooltip" data-bs-placement="left" title="Unkown">
                        <i class='bx bxs-inbox' ></i>
                    </span>
                </div>
                <div class="nav-item">
                    <span class="nav-icon" data-bs-toggle="tooltip" data-bs-placement="left" title="Notification">
                        <i class='bx bx-bell' ></i>
                    </span>
                </div>
                <div class="nav-item">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                                <span class="nav-icon" data-bs-toggle="tooltip" data-bs-placement="left" title="Profile">
                                    <i class='bx bx-user' ></i>
                                </span>
                        </template>

                        <template #content>
                            <p class="text-primary">{{ $page.props.auth.user.name }} {{ $page.props.auth.user.email }}</p>
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </div>
        </div>
    </header>
</template>

<style>

</style>
