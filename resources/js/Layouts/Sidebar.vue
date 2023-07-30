<script setup>
import NavLink from "@/Components/NavLink.vue";

const getActivePath = (routeName) => {
    const url = new URL(routeName)
    return url.pathname
}
</script>

<template>
    <aside class="sidebar">
        <div class="sidebar-items">
            <div class="sidebar-item">
                <div class="sidebar-item-body">
                    <ul>
                        <li :class="{ 'active': $page.url === getActivePath(route('dashboard')) }">
                            <NavLink :href="route('dashboard')">
                                <i class="bx bx-tachometer"></i>
                                Dashboard
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bx-analyse"></i>
                        </span>
                    <h4>Project & Services</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li :class="{ 'active': $page.url === getActivePath(route('project.create')) }">
                            <NavLink :href="route('project.create')">Add project</NavLink>
                        </li>
                        <li :class="{ 'active': $page.url === getActivePath(route('project.index')) }">
                            <NavLink :href="route('project.index')">Project list</NavLink>
                        </li>
                        <li :class="{ 'active': $page.url === getActivePath(route('service.create')) }">
                            <NavLink :href="route('service.create')">Add service</NavLink>
                        </li>
                        <li :class="{ 'active': $page.url === getActivePath(route('service.index')) }">
                            <NavLink :href="route('service.index')">Service list</NavLink>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bx-archive"></i>
                        </span>
                    <h4>Configuration</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li :class="{ 'active': $page.url === getActivePath(route('category.index')) }">
                            <NavLink :href="route('category.index')">Categories</NavLink>
                        </li>
                        <li :class="{ 'active': $page.url === getActivePath(route('partner.index')) }">
                            <NavLink :href="route('partner.index')">Partners</NavLink>
                        </li>
                        <li :class="{ 'active': $page.url === getActivePath(route('client.index')) }">
                            <NavLink :href="route('client.index')">Clients</NavLink>
                        </li>
                        <li :class="{ 'active': $page.url === getActivePath(route('leader.index')) }">
                            <NavLink :href="route('leader.index')">Leaders</NavLink>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bxs-inbox"></i>
                        </span>
                    <h4>Contact & Settings</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li><a href="">Contacts</a></li>
                        <li :class="{ 'active': $page.url === getActivePath(route('contact.settings')) }">
                            <NavLink :href="route('contact.settings')">Contact Settings</NavLink>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bx-cog"></i>
                        </span>
                    <h4>Users & Settings</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li :class="{ 'active': $page.url === getActivePath(route('site.settings')) }">
                            <NavLink :href="route('site.settings')">Site Settings</NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </aside>
</template>

<style scoped>

</style>
