<template>
  <section class="p-6 bg-gray-300">
    <header class="flex justify-between max-w-7xl mx-auto">
      <div class="flex items-center text-2xl">
        <Link href="/">
          <h1 class="font-bold">MY<span class="font-thin">APLICATION</span></h1>
        </Link>
        <p class="text-sm ml-4">
          Bem vindo, {{ user }}
        </p>
      </div>
      <NavBar />
    </header>
  </section>
  <section class="p-6">
    <div class="max-w-7xl mx-auto p-5 shadow-lg shadow-gray-500/30 rounded-md border">
      <slot />
    </div>
  </section>
</template>

<script setup>
  import { computed, watch } from "vue";
  import { usePage } from "@inertiajs/inertia-vue3";
  import NavBar from "./NavBar";

  const user = computed(() => {
    return usePage().props.value.auth.user;
  });

  watch(usePage().props.value.auth.user, (value) => {
    if(!value) {

      console.log('value');
    }
	});
</script>
