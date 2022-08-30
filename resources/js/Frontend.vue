<template>
    <div>
        <Navbar></Navbar>
        <div class="container py-5">
            <h1 class="pb-5">Posts List</h1>
            <PostsList></PostsList>
        </div>
    </div>
</template>

<script>
import Navbar from './frontend/components/Navbar.vue';
import PostsList from './frontend/components/PostsList.vue';
export default {
    components: { Navbar, PostsList },
    data() {
        return {
            
        };
    },
}
</script>