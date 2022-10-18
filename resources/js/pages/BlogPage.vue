<template>
        <main class="container">
            <h1 class="mt-3">Liste dei post:</h1>
            <div v-if="loading" class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Caricamento...</span>
                </div>
            </div>
            <div v-else>
                   <MySinglePost v-for="(post, index) in posts" :key="index" :post="post"/>
            </div>
            <nav>
                <ul class="pagination">
                    <li class="page-item" :class="(currentPage==1)?'disabled':''"><a class="page-link"  href="#" @click.prevent="getPosts(currentPage - 1)">Precedente</a></li>
                    <li class="page-item" :class="(currentPage==lastPage)?'disabled':''"><a class="page-link"  href="#" @click.prevent="getPosts(currentPage + 1)">Successiva</a></li>
                </ul>
            </nav>
        </main>
</template>

<script>
    import Axios from 'axios';
    import MySinglePost from '../components/MySinglePost.vue';
    export default {
    name: "MyMain",
    data() {
        return {
            posts: [],
            loading: true,
            currentPage: 1,
            lastPage: null
        };
    },
    methods: {
        getPosts(numPage) {
            this.loading = true;
            Axios.get("/api/posts", { params: { page: numPage } })
                .then((response) => {
                this.posts = response.data.results.data;
                this.loading = false;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            });
        },
       
    },
    mounted() {
        this.getPosts(1);
    },
    components: { MySinglePost }
}
</script>
