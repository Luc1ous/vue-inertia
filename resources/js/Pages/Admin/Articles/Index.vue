<template>
  <AdminLayout>
    <div v-if="$page.props.flash.message">
      <Alert :message="$page.props.flash.message"/>
    </div>
    <div class="flex flex-col mb-20">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
              <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                  Articles
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                  Create articles, edit, and delete.
                </p>
                <Link href="/admin/articles/create" type="button" class="mt-5 py-3 px-10 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 transition-all text-sm">
                  Create Article
                </Link>
              </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-gray-50 dark:bg-slate-800">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left">
                    <a class="group inline-flex items-center gap-x-2" href="#">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Title
                      </span>
                    </a>
                  </th>

                  <th scope="col" class="px-6 py-3 text-left">
                    <a class="group inline-flex items-center gap-x-2" href="#">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Slug
                      </span>
                    </a>
                  </th>

                  <th scope="col" class="px-6 py-3 text-left">
                    <a class="group inline-flex items-center gap-x-2" href="#">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Created At
                      </span>
                    </a>
                  </th>

                  <th scope="col" class="px-6 py-3 text-left">
                    <a class="group inline-flex items-center gap-x-2" href="#">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Action
                      </span>
                    </a>
                  </th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                <tr 
                v-for="article in articles.data" :key="article"
                class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                  <td class="h-px w-px min-w-[220px]">
                    <div class="block relative z-10">
                      <div class="px-6 py-2">
                        <p class="text-sm text-gray-500">{{ article.title }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="h-px w-px min-w-[18rem]">
                    <Link class="block relative z-10" :href="`/articles/`+article.slug">
                      <div class="px-6 py-2">
                        <div class="block text-sm text-blue-600 decoration-2 hover:underline dark:text-blue-500">{{ article.slug }}</div>
                      </div>
                    </Link>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                    <a class="block relative z-10" href="#">
                      <div class="px-6 py-2 flex -space-x-2">
                        <p class="text-sm text-gray-500">{{ moment(article.created_at).format('LL') }}</p>
                      </div>
                    </a>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                    <div class="px-6 py-2">
                      <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                        <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 bg-gray-100 inline-flex justify-center items-center gap-2 rounded-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                          Actions
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-20 bg-white shadow-2xl rounded-lg p-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-dropdown-1">
                          <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                              Actions
                            </span>
                            <Link class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" :href="`/admin/articles/`+article.slug+`/edit`">
                              Edit
                            </Link>
                            <Link class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-red-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" @click.prevent="deleteArticle(article.slug)" href="">
                              Delete
                            </Link>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
              <div class="" v-if="articles.length > 0">
                <Pagination :links="articles.links" />
              </div>
            </div>
            <!-- End Footer -->
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script>
  import AdminLayout from '../../../Layout/AdminLayout.vue';
  import Pagination from '../../../Components/Pagination.vue';
  import Alert from '../../../Components/Alert.vue';
  import { Link } from '@inertiajs/inertia-vue3';
  import moment from 'moment'
  import { Inertia } from '@inertiajs/inertia';

  export default {
    components: {
      AdminLayout,
      Pagination,
      Alert,
      Link,
    },
    methods: {
      moment,
      deleteArticle(slug){
        Inertia.delete(`/admin/articles/`+slug)
      },
    },
    props: {
      articles: Object,
    }
  }
</script>

<style lang="scss" scoped>

</style>