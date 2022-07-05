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
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
  name: "NavBar",
  components: {
    NavLink
  }
}
</script>
<style scoped>
</style>
