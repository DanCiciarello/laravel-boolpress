<template>
    <div>
        
        <Navbar></Navbar>

        <router-view></router-view>

    </div>
</template>

<script>
import Navbar from './frontend/components/Navbar.vue';
// import PostsList from './frontend/components/PostsList.vue';
export default {
    components: { Navbar },
    data() {
        return {
            
        };
    },
}
</script>