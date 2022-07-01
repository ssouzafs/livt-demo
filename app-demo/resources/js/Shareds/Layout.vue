<template>
  <section class="p-6 bg-gray-300">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
        <p class="text-sm ml-4">
          Bem vindo, {{ $page.props.auth.user.username }}
        </p>
      </div>
      <NavBar/>
    </header>
  </section>
  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <iframe class="mb-6" height="200px" width="100%" frameborder="no" scrolling="no" seamless
              src="https://player.simplecast.com/fd0bd2ba-c553-466c-a060-b144797ce369?dark=false">

      </iframe>

      <slot/>
    </div>
  </section>
</template>

<script>
import NavBar from "./NavBar";

export default {
  name: "Layout",
  props: {},
  components: {
    NavBar
  },
  computed() {
    return this.$page.props.auth.user.username;
  }
}
</script>

<style scoped>

</style>