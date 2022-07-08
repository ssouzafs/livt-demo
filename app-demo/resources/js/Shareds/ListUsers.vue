<template>
  <ConfirmDialog></ConfirmDialog>
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
      <tr
        v-for="(user, index) in users.data"
        :key="index"
        class="bg-white border-b-2 border-gray-200">
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
          <span class="flex gap-4 place-items-center">
            <Button
              class="p-button-outlined p-button-info p-button-sm gap-1"
              @click.prevent="edit(user.id)">
              <ph-note-pencil :size="17" />
              Editar
            </Button>
            <Button
              class="p-button-outlined p-button-danger p-button-sm gap-1"
              @click.prevent="confirmDelete($event, user.id)">
              <ph-trash :size="17" />
              Delete
            </Button>
          </span>
        </td>
      </tr>
    </tbody>
  </table>
  <Paginator :links="users.links" />
</template>

<script setup>
  import Paginator from "../Shareds/Paginator.vue";
  import { useConfirm } from "primevue/useconfirm";
  import ConfirmDialog from "primevue/confirmdialog";
  import { useToast } from "primevue/usetoast";
  import { usePage } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";
  import { PhTrash } from "phosphor-vue";
  import { PhNotePencil } from "phosphor-vue";

  defineProps({
    users: Object,
  });
  const confirm = useConfirm();
  const toast = useToast();

  const confirmDelete = (event, id) => {
    console.log(id);
    confirm.require({
      message: "Deseja realmente excluir esse registro?",
      header: "Confirmar Operação",
      icon: "pi pi-exclamation-triangle",
      accept: () => {
        Inertia.delete(`/users/${id}`, {
          onSuccess: () => {
            showFlashMessage("error");
          },
        });
      },
    });
  };

  function showFlashMessage(
    typeMessage = "success",
    titleMessage = "Operação Realizada",
    message = usePage().props.value.flash.message
  ) {
    toast.add({
      severity: typeMessage,
      summary: titleMessage,
      detail: message,
      closable: true,
      life: 3000,
    });
  }

  const edit = (id) => {
    Inertia.get(`/users/${id}/edit`);
  };
</script>
