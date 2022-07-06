<template>
  <Head title="Login" />
  <div class="h-screen flex place-items-center">
    <div class="mx-auto p-5 shadow-lg shadow-gray-500/30 rounded-md border min-w-[30%]">
      <form @submit.prevent="submit">
        <div class="mb-6 grid grid-cols-1 place-items-center h-18 text-2xl">
          <h1 class="font-bold">MY<span class="font-thin">APLICATION</span></h1>
        </div>

        <div class="my-6">
          <div class="p-float-label">
            <InputText
              v-model="form.email"
              :class="form.errors.email ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500'"
              class="w-full mb-3 outline-none"
              type="text"
            />
            <label class="text-900 font-light" for="Email:">Email:</label>
          </div>
          <small
            v-if="form.errors.email"
            class="text-red-500"
            v-html="form.errors.email"
          />
        </div>
        <div class="mt-6">
          <div class="p-float-label">
            <InputText
              id="email1" v-model="form.password"
              :class="form.errors.password ? 'border-red-500 focus:ring focus:ring ring-red-200' : 'border-indigo-500'"
              class="w-full mb-3 outline-none"
              type="password"
            />
            <label class="text-900 font-light" for="Email:">Senha:</label>
          </div>
          <small
            v-if="form.errors.password"
            class="text-red-500"
            v-html="form.errors.password"
          />
        </div>
        <button
          :disabled="form.processing"
          class="w-full mt-3 bg-blue-500 text-gray-100 h-10 rounded hover:bg-blue-600"
        >
          Entrar
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
  import { useForm } from "@inertiajs/inertia-vue3";

  const form = useForm({
    email: "admin@test.com.br",
    password: "admin"
  });

  const submit = () => {
    form.post("/login");
  };

</script>