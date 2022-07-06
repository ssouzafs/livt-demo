<template>
  <Head title="Login" />
  <Toast />
  <div class="h-screen flex items-center">
    <div class="mx-auto p-7 shadow-lg shadow-gray-500/30 rounded-md border min-w-[30%]">
      <form @submit.prevent="submit">
        <label for="email" class="block text-900 font-medium mb-2">E-mail:</label>
        <InputText
          id="email1" type="text"
          class="w-full mb-3 outline-none"
          :class="form.errors.email ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500'"
          v-model="form.email"
        />
        <small
          class="text-red-500"
          v-if="form.errors.email"
          v-html="form.errors.email"
        />

        <label for="password" class="block text-900 font-medium mt-2">Senha:</label>
        <InputText
          id="password"
          type="password"
          class="w-full mb-3 text-sm p-2 w-full border rounded-md outline-none"
          :class="form.errors.password ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500'"
          v-model="form.password"
        />
        <small
          class="text-red-500"
          v-if="form.errors.password"
          v-html="form.errors.password"
        />

        <button
          icon="pi pi-check"
          class="w-full mt-3 bg-blue-500 text-gray-100 h-10 rounded hover:bg-blue-600"
          :disabled="form.processing"
        > Entrar
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
  import { useForm } from "@inertiajs/inertia-vue3";
  import { useToast } from "primevue/usetoast";

  const toast = useToast();

  // const action = () => {
  //   console.log("teste");
  //   toast.add({ severity: "info", summary: "Infomação", detail: "Mensagem de teste", life: 3000 });
  // };

  const form = useForm({
    email: "",
    password: ""
  });

  const submit = () => {
    form.post("/login", {
      onError: () => {
        toast.add({ severity: "error", summary: "Acesso Negado", detail: "Os dados informados não conferem!", life: 3000 });
      }
    });
  };

</script>