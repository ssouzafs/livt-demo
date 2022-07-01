<template>
  <nav >
    <ul>
      <li>
        <Link class="text-3xl font-bold underline" href="/">Home</Link>
      </li>
      <li>
        <Link href="/users">Users</Link>
      </li>
      <li>
        <Link href="/settings">Settings</Link>
      </li>
    </ul>
  </nav>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
  name: "NavBar",

  components: {
    Link
  }
}
</script>
<style scoped>
/*nav ul{*/
/*  display: flex;*/
/*  background-color: #1f1e1e;*/
/*  padding: 15px;*/
/*  color: #FFF;*/
/*}*/

/*nav ul li  {*/
/*  padding: 10px;*/
/*}*/

/*nav ul li a:hover {*/
/*  text-decoration: underline;*/
/*}*/
</style>
