<template>
  <Layout>
    <div class="p-5 shadow-lg shadow-gray-500/30 rounded-md border">
      <Head>
        <title>Users</title>
        <meta type="description" content="Information the my app" head-key="description">
      </Head>
      <h1 class="text-2xl mb-4 border-b border-zinc-500 pb-3  font-light text-zinc-600 mb-3">
        Listagem de Usuários
      </h1>
      <div class="mt-6 w-full">
        <div class="mt-6 mb-3 flex justify-end">
          <Filter @informSearch="(value) => search = value" :props="props" />

          <!--          <input-->
          <!--            type="search"-->
          <!--            placeholder="Pesquisar..."-->
          <!--            class="h-9 text-sm p-2 w-2/5 rounded-lg outline-none focus:ring focus:ring-indigo-200  border border-indigo-400"-->
          <!--            v-model="search"-->
          <!--          >-->
        </div>
        <ListUsers :users="users" />
      </div>
    </div>
  </Layout>
</template>

<script setup>
  import { ref, watch } from "vue";
  import { Inertia } from "@inertiajs/inertia";
  import Paginator from "../Shareds/Paginator";
  import ListUsers from "../Shareds/ListUsers";
  import Filter from "../Shareds/Filter";
  //
  const search = ref("");

  let props = defineProps({
    users: Object,
    filters: Object
  });
  // const search = ref(props.filters.search);
  watch(search, (value) => {
    Inertia.get("/users", { search: value }, {
      preserveState: true,
      replace: true
    });

    console.log(search)
  });
</script>

