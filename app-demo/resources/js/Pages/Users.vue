<template>
  <Layout>
    <h1>
      Users
    </h1>
  </Layout>

  <div style="margin-top: 700px;">
    <p>Tempo Atual: {{ time }}</p>

    <Link href="/users" preserve-scroll>Refresh</Link>
  </div>
</template>

<script>
import Layout from "../Shareds/Layout";

export default {
  name: "Users",
  props: {
    time: String,
  },
  components: {
    Layout
  }
}
</script>

<style scoped>

</style>
