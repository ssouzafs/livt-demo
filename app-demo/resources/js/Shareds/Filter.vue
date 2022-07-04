<template>
  <input
    type="search"
    placeholder="Pesquisar..."
    class="h-9 text-sm p-2 w-2/5 rounded-lg outline-none focus:ring focus:ring-indigo-200  border border-indigo-400"
    v-model="search"
    @keyup="$emit('informSearch', search)"
  >
</template>

<script setup>
  import { ref } from "vue";

  const dataProps = defineProps({
    props: Object
  });

  const search = ref(dataProps.props.filters.search);
</script>