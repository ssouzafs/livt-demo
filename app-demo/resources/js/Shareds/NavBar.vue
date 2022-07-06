<template>
  <nav>
    <ul class="flex space-x-4 list-inside">
      <li>
        <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
      </li>
      <li>
        <NavLink href="/users" :active="$page.component === 'Users/Index'">Usuários</NavLink>
      </li>
      <li>
        <NavLink href="/settings" :active="$page.component === 'Users/Create'">Settings</NavLink>
      </li>
      <li>
        <!--        <NavLink href="/logout" >Sair</NavLink>-->
        <button type="submit" @click="submit">Sair</button>
      </li>
    </ul>
  </nav>
</template>

<script setup>
  import { Inertia } from "@inertiajs/inertia";
  import NavLink from "./NavLink";

  const submit = () => {
    Inertia.post("/logout");
  };

</script>
