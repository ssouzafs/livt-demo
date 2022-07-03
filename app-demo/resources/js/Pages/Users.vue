<template>
  <Layout>
    <Head>
      <title>Users</title>
      <meta type="description" content="Information the my app" head-key="description" charset="CESU-8">
    </Head>
    <h1 class="text-3xl">
      Users
    </h1>

    <div style="margin-top: 700px;">
      <p>Tempo Atual: {{ time }}</p>

      <Link href="/users" preserve-scroll>Refresh</Link>
    </div>
  </Layout>
</template>

<script setup>
  import { Head } from "@inertiajs/inertia-vue3";

  defineProps({
    time: String
  });
</script>

