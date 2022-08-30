<template>
  <div>
    <div class="container py-5">
        <h1 class="pb-5">Home</h1>

        <PostsList></PostsList>

    </div>
  </div>
</template>

<script>
import PostsList from '../frontend/components/PostsList.vue';
export default {
    components: { PostsList }
}
</script>

<style>

</style>