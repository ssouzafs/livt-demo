<template>
  <Layout>
    <Head>
      <title>Users</title>
      <meta type="description" content="Information the my app" head-key="description" charset="CESU-8">
    </Head>
    <h1 class="text-3xl">
      Users
    </h1>
  </Layout>
</template>

<script setup>
  // import { Head } from "@inertiajs/inertia-vue3";

  defineProps({
    users: Array
  });
</script>

