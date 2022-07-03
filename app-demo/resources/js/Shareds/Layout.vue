<template>
  <section class="p-6 bg-gray-300">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
        <p class="text-sm ml-4">
          Bem vindo, {{ username }}
        </p>
      </div>
      <NavBar />
    </header>
  </section>
  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot />
    </div>
  </section>
</template>

<script>
  import NavBar from "./NavBar";

  export default {
    name: "Layout",
    components: {
      NavBar,
    },
    computed: {
      username() {
        return this.$page.props.auth.user;
      }
    }
  };
</script>
