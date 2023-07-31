<template>
  <div class="flex justify-center items-center space-x-2">
    <component
    :is="link.url ? 'Link' : 'span'" 
    v-for="link in links" 
    :key="link"
    :href="link.url"
    class="text-gray-500 hover:text-blue-600 p-4 inline-flex cursor-pointer items-center font-medium rounded-full"
    :class="{'text-gray-400 hover:text-gray-400' : ! link.url, 'text-blue-800' : link.active}"
    preserve-scroll>
      <span v-html="link.label"></span>
    </component>
  </div>
</template>

<script>
  import { Link } from '@inertiajs/inertia-vue3';
  export default {
    components: {
      Link
    },
    props: {
      links: Array
    }
  }
</script>

<style lang="scss" scoped>

</style>