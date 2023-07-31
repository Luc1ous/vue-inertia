<template>
  <MainLayout>
    <!-- Blog Article -->
    <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
      <div class="max-w-2xl">
        <!-- Avatar Media -->
        <div class="flex justify-between items-center mb-6">
          <div class="flex w-full sm:items-center gap-x-5 sm:gap-x-3">
            <div class="flex-shrink-0">
              <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
            </div>

            <div class="grow">
              <div class="grid sm:flex sm:justify-between sm:items-center gap-2">
                <div>
                  <!-- Tooltip -->
                  <div class="inline-block">
                    <div class="sm:mb-1 block text-left cursor-pointer">
                      <span class="font-semibold text-gray-800 dark:text-gray-200">
                        {{ article.user.name }}
                      </span>
                    </div>
                  </div>
                  <!-- End Tooltip -->

                  <ul class="text-xs text-gray-500">
                    <li class="inline-block relative pr-6 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-2 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                      {{ moment(article.created_at).fromNow() }}
                    </li>
                    <li class="inline-block relative pr-6 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-2 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                      8 min read
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Avatar Media -->

        <!-- Content -->
        <div class="space-y-5 md:space-y-8">
          <div class="space-y-3">
            <h2 class="text-2xl font-bold md:text-3xl dark:text-white">{{ article.title }}</h2>

            <p class="text-lg text-gray-800 dark:text-gray-200 whitespace-pre-line">{{ article.description }}</p>
          </div>
          <div>
            <Link class="m-1 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200" :href="`/categories/`+article.category.slug">
              {{ article.category.name }}
            </Link>
          </div>
        </div>
        <!-- End Content -->
      </div>
    </div>
    <!-- End Blog Article -->
  </MainLayout>
</template>

<script setup>
  import MainLayout from '../Layout/MainLayout.vue';  
  import { Link } from '@inertiajs/inertia-vue3';
  import moment from 'moment'

  defineProps({
    article: Object
  })
</script>

<style lang="scss" scoped>

</style>