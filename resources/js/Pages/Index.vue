<template>
  <MainLayout>
    <ArticleCard :articles="articles.data" />
    <Pagination :links="articles.links"></Pagination>
  </MainLayout>
</template>

<script setup>
  import MainLayout from '../Layout/MainLayout.vue';
  import ArticleCard from '../Components/ArticleCard.vue';
  import Pagination from '../Components/Pagination.vue';

  defineProps({
    articles: Object
  })
</script>

<style lang="scss" scoped>

</style>