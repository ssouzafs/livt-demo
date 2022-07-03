<template>
  <Layout>
    <Head>
      <title>Users</title>
      <meta type="description" content="Information the my app" head-key="description" charset="CESU-8">
    </Head>
    <h1 class="text-3xl">
      Users
    </h1>
    <ul>
      <li v-for="(user, index) in users">{{ user }}</li>
    </ul>

  </Layout>
</template>

<script setup>
  defineProps({
    users: Array
  });
</script>

