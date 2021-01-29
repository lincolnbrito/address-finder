<template>
  <div id="app" class="container flex flex-col h-screen w-1/2 pt-8">

    <h1 class="font-sans text-4xl font-extrabold leading-none text-black sm:text-5xl xl:text-6xl text-center sm:text-center">Address Finder</h1>

    <div class="py-4 w-full col-span-1 p-6 bg-white rounded-lg shadow">

      <div class="grid grid-cols-2 gap-4 mb-4">
        <input type="number" placeholder="Buscar por CEP" class="form-control">
        <a href="#" class="btn btn-primary text-center" @click.stop.prevent="creatingProperty=true">
          <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          Buscar
        </a>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <input type="text" placeholder="Buscar por Logradouro" class="form-control">
        <a href="#" class="btn btn-primary text-center" @click.stop.prevent="creatingProperty=true">
          <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          Buscar
        </a>
      </div>
    </div>

    <div class="py-4 w-full col-span-1 p-6 bg-white rounded-lg shadow mt-8">

    </div>

  </div>
</template>

<script>

export default {
  name: 'App',
}
</script>

<style>
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
