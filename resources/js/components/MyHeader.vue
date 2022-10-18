<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand text-white" href="#">Boolpress</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" v-for="(link, index) in menuLinks" :key="index">
                        <router-link class="nav-link text-white" :to="{name: link.route}">{{link.linkName}}</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: 'MyHeader',
        data() {
            return {
                menuLinks: [
                    {
                        linkName: 'Home',
                        route: 'home'
                    },
                    {
                        linkName: 'Blog',
                        route: 'blog'
                    },
                    {
                        linkName: 'About Us',
                        route: 'about'
                    },
                    {
                        linkName: 'Contact',
                        route: 'contact'
                    },
                ],
            }
        }
    }
</script>

