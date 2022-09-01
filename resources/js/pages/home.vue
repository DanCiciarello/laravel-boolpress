<template>
  <div>
    <Jumbotron></Jumbotron>
    <div class="container py-5">

        <PostsList></PostsList>

    </div>
  </div>
</template>

<script>
import PostsList from '../frontend/components/PostsList.vue';
import Jumbotron from '../frontend/components/Jumbotron.vue';
export default {
    components: { PostsList, Jumbotron }
}
</script>

<style>

</style>