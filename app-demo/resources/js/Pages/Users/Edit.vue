<template>
  <Layout>
    <Head>
      <title>Edição de Usuário</title>
    </Head>
    <div class="mb-7 border-b border-zinc-500 flex justify-between">
      <h1 class="font-light text-zinc-600 text-xl ">Edição de Usuário - {{ user.id }}</h1>
      <Link class="p-2 text-indigo-600 hover:underline text-indigo-500" href="/users/"
            v-text="`Ir para Listagem`"/>
    </div>
    <form class="max-w-xl mx-auto my-8" @submit.prevent="update">
      <div class="mb-6">
        <label
          class="block mb-2 font-light text-sm text-gray-700"
          for="name"
        >
          Nome:
        </label>
        <input
          id="name"
          v-model="form.name"
          :class="form.errors.name ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500' "
          class="h-9 text-sm p-2 w-full border rounded-md outline-none"
          name="name"
          placeholder="Insira o nome..."
          type="text"
        >
        <small
          v-if="form.errors.name"
          class="text-red-500"
          v-html="form.errors.name"
        >
        </small>
      </div>
      <div class="mb-6">
        <label
          class="block mb-2 font-light text-sm text-gray-700"
          for="email"
        >
          E-mail:
        </label>
        <input
          id="email"
          v-model="form.email"
          :class="form.errors.email ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500' "
          class="h-9 text-sm p-2 w-full border rounded-md outline-none"
          placeholder="Insira seu melhor e-mail..."
          type="text"
        >
        <small
          v-if="form.errors.email"
          class="text-red-500"
          v-html="form.errors.email"
        >
        </small>

      </div>
      <div class="mb-6">
        <label
          class="block mb-2 font-light text-sm text-gray-700"
          for="password"
        >
          Senha:
        </label>
        <input
          v-model="form.password"
          :class="form.errors.password ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500' "
          class="h-9 text-sm p-2 w-full rounded-md outline-none border"
          type="password"
        >
        <small
          v-if="form.errors.password"
          class="text-red-500"
          v-html="form.errors.password"
        >
        </small>
      </div>
      <div class="mb-6 text-end">
        <button
          :disabled="form.processing"
          class="bg-indigo-600 text-white rounded py-2 px-4 hover:bg-indigo-500"
          type="submit"
        >
          Salvar Atualização
        </button>
      </div>
    </form>
  </Layout>
</template>

<script setup>
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {useToast} from "primevue/usetoast";

const toast = useToast()
const props = defineProps({
  user: Object
});

const form = useForm({
  id: props.user.id,
  name: props.user.name,
  email: props.user.email,
  password: ''
});

const update = () => {
  if (form.isDirty) {
    form.put(`/users/${form.id}`, {
      onSuccess: () => {
        form.reset('password');
        showFlashMessage();
      }
    });
  }
};

function showFlashMessage(
  message = usePage().props.value.flash.message, typeMessage = "success",
  titleMessage = "Operação Realizada"
) {
  toast.add({
    severity: typeMessage,
    summary: titleMessage,
    detail: message,
    closable: true,
    life: 3000
  });
}
</script>
