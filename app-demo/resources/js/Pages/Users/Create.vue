<template>
  <Layout>
    <Head>
      <title>Novo Usuário</title>
    </Head>
    <HeaderContent>Criar Usuário</HeaderContent>
    <form @submit.prevent="submit" class="max-w-xl mx-auto my-8">
      <div class="p-3 rounded border border-green-500 text-green-500 font-light mb-3 flex justify-between" v-if="$page.props.flash.message">
        <span>{{ $page.props.flash.message }}</span>
        <Link class="hover:font-normal" @click="dismiss">X</Link>
      </div>
      <div class="mb-6">
        <label
          for="name"
          class="block mb-2 font-light text-sm text-gray-700"
        >
          Nome:
        </label>
        <input
          type="text"
          name="name"
          id="name"
          :class="$page.props.errors.name ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500' "
          class="h-9 text-sm p-2 w-full border rounded-md outline-none"
          v-model="form.name"
          placeholder="Insira o nome..."
        >
        <small
          class="text-red-500"
          v-if="$page.props.errors.name"
          v-html="$page.props.errors.name"
        >
        </small>
      </div>
      <div class="mb-6">
        <label
          for="email"
          class="block mb-2 font-light text-sm text-gray-700"
        >
          E-mail:
        </label>
        <input
          type="text"
          name="email"
          id="email"
          v-model="form.email"
          placeholder="Insira seu melhor e-mail..."
          :class="$page.props.errors.email ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500' "
          class="h-9 text-sm p-2 w-full border rounded-md outline-none"
        >
        <small
          class="text-red-500"
          v-if="$page.props.errors.email"
          v-html="$page.props.errors.email"
        >
        </small>

      </div>
      <div class="mb-6">
        <label
          for="password"
          class="block mb-2 font-light text-sm text-gray-700"
        >
          Senha:
        </label>
        <input
          type="password"
          name="password"
          id="password"
          v-model="form.password"
          placeholder="Insira um senha..."
          :class="$page.props.errors.password ? 'border-red-500 focus:ring focus: ring ring-red-200' : 'border-indigo-500' "
          class="h-9 text-sm p-2 w-full rounded-md outline-none border"
        >
        <small
          class="text-red-500"
          v-if="$page.props.errors.password"
          v-html="$page.props.errors.password"
        >
        </small>
      </div>
      <div class="mb-6 text-end">
        <button
          type="submit"
          class="bg-indigo-600 text-white rounded py-2 px-4 hover:bg-indigo-500"
        >
          Cadastrar
        </button>
      </div>

    </form>
  </Layout>
</template>

<script setup>
  import { reactive } from "vue";
  import { Inertia } from "@inertiajs/inertia";
  import HeaderContent from "../../Shareds/HeaderContent";

  let form = reactive({
    name: "",
    email: "",
    password: ""
  });

  let submit = () => {
    Inertia.post("/users/store", form);
  };
</script>