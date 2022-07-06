<template>
  <Layout>
    <Head>
      <title>Lista de Usuários</title>
      <meta content="Information the my app" head-key="description" type="description">
    </Head>
    <div class="mb-7 border-b border-zinc-500 pb-2 flex justify-between">
      <h1 class="font-light text-zinc-600 text-2xl ">Listagem de Usuários</h1>
      <Link class="p-2 text-indigo-600 hover:underline text-indigo-500" href="/users/create">Criar Novo</Link>
    </div>
    <div class="mt-6 w-full">
      <div class="mt-6 mb-3 flex justify-end">
        <input
          v-model="search"
          class="h-9 text-sm p-2 w-2/5 rounded-lg outline-none focus:ring focus:ring-indigo-200  border border-indigo-400"
          placeholder="Pesquisar..."
          type="search"
        >
      </div>
      <ListUsers :users="users" />
    </div>
  </Layout>
</template>

<script setup>
  import { ref, watch } from "vue";
  import debounce from "lodash/debounce";
  import { Inertia } from "@inertiajs/inertia";
  import Paginator from "../../Shareds/Paginator";
  import ListUsers from "../../Shareds/ListUsers";

  let props = defineProps({
    users: Object,
    filters: Object
  });
  const search = ref(props.filters.search);

  watch(search, debounce(() => {
    console.log("Teste");
    Inertia.get("/users", { search: search.value }, {
      preserveState: true,
      replace: true
    });
  }, 300));
</script>

