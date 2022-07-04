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
          <input
            type="search"
            placeholder="Pesquisar..."
            class="h-9 text-sm p-2 w-2/5 rounded-lg outline-none focus:ring focus:ring-indigo-200  border border-indigo-400"
            v-model="search"
          >
        </div>
        <table class="w-full mx-auto table-auto font-light">
          <thead class="justify-between">
          <tr class="bg-indigo-500">
            <th class="px-16 py-2">
              <span class="text-gray-100 font-semibold">ID</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-100 font-semibold">Nome</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-100 font-semibold">Email</span>
            </th>
            <th class="px-17 py-2">
              <span class="text-gray-100 font-semibold">Data de Cadastro</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-100 font-semibold">Ações</span>
            </th>
          </tr>
          </thead>
          <tbody class="bg-gray-200">
          <tr class="bg-white border-b-2 border-gray-200" v-for="(user, index) in users.data" :key="index">
            <td class="px-16 py-2 flex flex-row items-center text-zinc-900">
              {{ user.id }}
            </td>
            <td>
              <span class="text-center ml-2 text-zinc-900">{{ user.name }}</span>
            </td>
            <td class="px-16 py-2 text-zinc-900">
              <span>{{ user.email }}</span>
            </td>
            <td class="px-17 py-2 text-zinc-900">
              <span>{{ user.created_at }}</span>
            </td>
            <td class="px-16 py-2 text-zinc-900">
              <span class="text-yellow-500 flex">
                 <Link :href="`/users/${user.id}/edit`">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-indigo-700 mx-2 hover:cursor-pointer"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      title="Editar"
                    >
                      <path
                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                      />
                      <path
                        fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd"
                      />
                  </svg>
                </Link>
                <Link>
                   <svg
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5 text-red-500 hover:cursor-pointer"
                     viewBox="0 0 20 20"
                     fill="currentColor"
                   >
                      <path
                        fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                      />
                  </svg>
                </Link>
              </span>
            </td>
          </tr>
          </tbody>
        </table>
        <Paginator :links="users.links" />
      </div>
    </div>
  </Layout>
</template>

<script setup>
  import { ref, watch } from "vue";
  import { Inertia } from "@inertiajs/inertia";
  import Paginator from "../Shareds/Paginator";

  const search = ref(props.filters.search);

  let props = defineProps({
    users: Object,
    filters: Object
  });

  watch(search, (value) => {
    Inertia.get("/users", { search: value }, {
      preserveState: true,
      replace: true
    });
  });
</script>

