<template>
  <Head title="Login" />
  <Toast />
  <div class="h-screen flex items-center">
    <div class="mx-auto p-6 shadow-lg shadow-gray-500/30 rounded-md border">
      <form @submit.prevent="submit">
        <label for="email" class="block text-900 font-medium mb-2">E-mail:</label>
        <InputText id="email1" type="text" class="w-full mb-3" v-model="form.email" />

        <label for="password" class="block text-900 font-medium mt-2">Senha:</label>
        <InputText id="password" type="password" class="w-full mb-3" v-model="form.password" />

        <button
          icon="pi pi-check"
          class="w-full mt-3 bg-blue-500 text-gray-100 h-10 rounded hover:bg-blue-600"
          @click="action"
          :disabled="form.processing"
        > Entrar
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
  import { useForm } from "@inertiajs/inertia-vue3";
  // import { useToast } from "primevue/usetoast";

  // const toast = useToast();
  //
  // const action = () => {
  //   console.log("teste");
  //   toast.add({ severity: "info", summary: "Infomação", detail: "Mensagem de teste", life: 3000 });
  // };

  const form = useForm({
    email: "",
    password: ""
  });

  const submit = () => {
    form.post('/login');
  }


</script>

<style scoped>

</style>