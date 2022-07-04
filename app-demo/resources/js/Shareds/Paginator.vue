<template>
  <div class="mt-6 flex justify-center">
    <Component
      :is="link.url ? 'Link' : 'span'"
      v-for="link in links"
      :href="link.url"
      v-html="link.label"
      class="px-5 py-2 mx-1 rounded"
      :class="{
        'opacity-25': !link.url,
        'font-light': !link.active,
        'border-b-4 border-indigo-500 font-bold': link.active
      }"
    />
  </div>

</template>

<script setup>

  defineProps({
    links: Array,
    active: Boolean
  });
</script>