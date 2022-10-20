<template>
    <div class="container mt-5" v-if="post">
        <div class="card" style="width: 30rem;">
            <img :src="post.media" class="card-img-top" :alt="post.title">
            <div class="card-body">
                <h2 class="card-title">{{post.title}}</h2>
                <h5 class="card-title">Scritto da: {{post.author}}</h5>
                <h5 class="card-title">Categoria: {{post.category?post.category.name:'Nessuna Categoria'}}</h5>
                <h5 class="card-title">Tag:</h5>
                <span v-for="tag in post.tags" class="mr-2 badge badge-success" :key="tag.id">{{tag.name}}</span>
                <p class="card-text">{{post.content}}</p>
                <router-link :to="{name: 'blog'}" class="btn btn-primary mt-3">Torna alla lista</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ShowPost',
        data() {
        return {
            post: null
        }
    },
    methods: {
        getSinglePost() {
            const slug = this.$route.params.slug;
            axios.get('/api/posts/' + slug)
            .then((response) => {
                this.post = response.data.result;
            })
            .catch((error) => {
                this.$router.push({name: 'not-found'});
            });
        }
    },
    mounted() {
        this.getSinglePost();
    }
}
</script>

<style>

</style>