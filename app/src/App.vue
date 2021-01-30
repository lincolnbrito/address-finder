<template>
  <div id="app" class="container flex flex-col h-screen w-1/2 pt-8">

    <h1 class="font-sans text-3xl font-extrabold leading-none text-black sm:text-5xl xl:text-5xl text-center sm:text-center">Address Finder</h1>

    <div class="py-4 w-full col-span-1 p-6 bg-white rounded-lg shadow">
      <div class="grid grid-cols-2 gap-4 mb-4">
        <input type="number" placeholder="Search by Zipcode" class="form-control" v-model="form.zipcode">
        <a href="#" :disabled="!form.zipcode" class="btn btn-primary text-center" @click="searchByZipcode">
          <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          Search
        </a>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <input type="text" placeholder="Search by neighborhood" class="form-control">
        <a href="#" :disabled="!form.neighborhood" class="btn btn-primary text-center" @click.stop.prevent="creatingProperty=true">
          <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          Search
        </a>
      </div>
    </div>

    <div class="alert" v-if="loading">Searching address. Please wait...</div>

    <div class="py-4 w-full col-span-1 p-6 bg-white rounded-lg shadow mt-8" v-if="result || error ">
      <div class="result" v-if="result">
        <div class="result-item">
          <span class="badge badge-default">Zipcode</span>
          <span class="w-2/3 font-bold">{{ result.zipcode }}</span>
        </div>
        <div class="result-item">
          <span class="badge badge-default">Street</span>
          <span class="w-2/3 font-bold">{{ result.street }}</span>
        </div>
        <div class="result-item">
          <span class="badge badge-default">Neighborhood</span>
          <span class="w-2/3 font-bold">{{ result.neighborhood }}</span>
        </div>
        <div class="result-item">
          <span class="badge badge-default">City</span>
          <span class="w-2/3 font-bold">{{ result.city }}</span>
        </div>
        <div class="result-item">
          <span class="badge badge-default">State</span>
          <span class="w-2/3 font-bold">{{ result.state }}</span>
        </div>
      </div>
      <div v-if="error" class="error">
        {{ error }}
      </div>
    </div>

  </div>
</template>

<script>
import ZipcodeService from '@/services/zipcode.service'
export default {
  name: 'App',
  data() {
    return {
      form: {
        zipcode: null,
        neighborhood: null
      },
      result: null,
      error: null,
      loading: false
    }
  },
  methods: {
    async searchByZipcode() {
      this.loading = true;
      this.error = null;
      this.result = null;
      try {
        let response = await ZipcodeService.search(this.form.zipcode);
        this.loading = false;
        this.result = response.data.data;
      } catch (err) {
        this.loading = false;
        this.error = err.response.data.message
      }
    }
  }
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
