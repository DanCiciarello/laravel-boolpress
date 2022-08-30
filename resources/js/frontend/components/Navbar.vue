<template>
  <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img
          src="/img/logo-boolpress-dark.png"
          alt="Logo Boolpress"
          width="200"
        />
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'contacts' }">Contatti</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
    export default{

    }
</script>

<style>
  #navbarSupportedContent{
    justify-content: flex-end;
  }
</style>