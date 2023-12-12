<template>
    <nav class="navbar navbar-expand-lg">
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link :to="{ name: 'infinite-scroll' }" class="nav-link">Infinite Scroll</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'search' }" class="nav-link">Search</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'datatable' }" class="nav-link">Datatable</router-link>
                </li>

                <li class="nav-item">
                    <router-link :to="{ name: 'password-checker' }" class="nav-link">Password Checker</router-link>
                </li>

                <li class="nav-item">
                    <router-link :to="{ name: 'is-typing' }" class="nav-link">Is Typing</router-link>
                </li>

                <li class="nav-item">
                    <router-link :to="{ name: 'blog-datatabel' }" class="nav-link">Blog Datatabel</router-link>
                </li>
            </ul>
           
        </div>
    </nav>
</template>

<script>
    export default {


    }
</script>