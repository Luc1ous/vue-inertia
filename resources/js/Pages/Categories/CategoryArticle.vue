<template>
  <MainLayout>
    <div class="flex flex-col space-y-4 mx-8 mt-8 bg-white border shadow-sm rounded-xl p-4 md:p-8 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
      <h1 class="text-3xl capitalize font-semibold">{{ category.name }}</h1>
      <p class="text-base">{{ category.description }}</p>
    </div>
    <ArticleCard :articles="articles.data" />
    <Pagination :links="articles.links"/>
  </MainLayout>
</template>

<script setup>
  import MainLayout from '../../Layout/MainLayout.vue'
  import ArticleCard from '../../Components/ArticleCard.vue'
  import Pagination from '../../Components/Pagination.vue';

  defineProps({
    articles: Object,
    category: Object
  })
</script>

<style lang="scss" scoped>

</style>