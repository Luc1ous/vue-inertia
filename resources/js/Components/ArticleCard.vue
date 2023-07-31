<template>
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="grid lg:grid-cols-2 lg:gap-y-16 gap-10">
      <Link 
      v-for="article in articles"
      :key="article"
      :href="`/articles/`+article.slug"
      class="group rounded-xl overflow-hidden">
        <div class="sm:flex">
          <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img class="group-hover:scale-105 transition-transform duration-500 ease-in-out w-full h-full absolute top-0 left-0 object-cover rounded-xl" src="https://images.unsplash.com/photo-1688459554930-178292e48193?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Image Description">
          </div>

          <div class="grow mt-4 sm:mt-0 sm:ml-6 px-4 sm:px-0">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-300 dark:group-hover:text-white">
              {{ article.title.substring(0, 50)+'...' }}
            </h3>
            <p class="mt-3 text-gray-600 dark:text-gray-400">
              {{ article.description.substring(0, 100)+'...' }}
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium">
              Read more
              <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </p>
          </div>
        </div>
      </Link>
    </div>
  </div>
</template>

<script setup>
  import { Link } from "@inertiajs/inertia-vue3"
  defineProps({
    articles: Object
  })
</script>

<style lang="scss" scoped>

</style>