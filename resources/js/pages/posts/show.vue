<template>
    <div>
        <div class="container py-5">
            <h1 class="pb-3">{{ post.title }}</h1>
            <h5 class="pb-4">
                Autore: {{ post.user.name }}
            </h5>
    
            <img :src="post.cover_img" width="500" class="pb-5"/>
            <p class="pb-5" v-html="post.content"></p>
    
            <div v-if="post.tags.length > 0">
                <h4>Tags</h4>
                <ul>
                    <li v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            post: {},
        };
    },
    mounted() {
        axios.get("/api/posts/" + this.$route.params.slug).then((resp) => {
            const data = resp.data;
            this.post = data;
        });
    },
};
</script>