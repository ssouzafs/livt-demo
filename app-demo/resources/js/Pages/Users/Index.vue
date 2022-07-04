<template>
  <Layout>
    <Head>
      <title>Lista de Usuários</title>
      <meta type="description" content="Information the my app" head-key="description">
    </Head>
    <HeaderContent>Listagem de Usuários</HeaderContent>
    <Link class="p-2 text-indigo-600 hover:underline text-indigo-500" href="/users/create">Criar Novo</Link>
    <div class="mt-6 w-full">
      <div class="mt-6 mb-3 flex justify-end">
        <input
          type="search"
          placeholder="Pesquisar..."
          class="h-9 text-sm p-2 w-2/5 rounded-lg outline-none focus:ring focus:ring-indigo-200  border border-indigo-400"
          v-model="search"
        >
      </div>
      <ListUsers :users="users" />
    </div>
  </Layout>
</template>

<script setup>
  import { ref, watch } from "vue";
  import _ from "lodash";
  import { Inertia } from "@inertiajs/inertia";
  import Paginator from "../../Shareds/Paginator";
  import ListUsers from "../../Shareds/ListUsers";
  import HeaderContent from "../../Shareds/HeaderContent";

  let props = defineProps({
    users: Object,
    filters: Object
  });
  const search = ref(props.filters.search);

  watch(search, _.debounce(() => {
    Inertia.get("/users", { search: search.value }, {
      preserveState: true,
      replace: true
    });
  }, 400));
</script>

