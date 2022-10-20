<template>
    <div class="card my-3 p-2 rounded">
        <img :src="post.media" class="card-img-top" :alt="post.title">
        <div class="card-body">
            <h5 class="card-title">Titolo: {{post.title}}</h5>
            <h5 class="card-title">Scritto da: {{post.author}}</h5>
            <p class="card-text">Contenuto: {{substringText(post.content)}}</p>
            <p class="card-text">Categoria: {{post.category?post.category.name:'Nessuna Categoria'}}</p>
            <h5>Tags:</h5>
            <div v-if="(post.tags.length > 0)">
                <ul v-for="(tag, x) in post.tags" :key="x">
                    <li class="card-text">
                        {{  tag.name }}
                    </li>
                </ul>
            </div>
            <div v-else>
                <strong>Nessun Tag</strong>
            </div>
            <router-link :to="{name: 'showpost', params: {slug: post.slug}}" class="btn btn-primary">Show More</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'MySinglePost',
        props: ['post'],
        methods: {
            substringText(text) {
            if (text.length < 100) {
                return text;
            }
            else {
                return text.substring(0, 100) + "..";
            }
        }
        }
    }
</script>

<style>

</style>