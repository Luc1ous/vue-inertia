<template>
  <AdminLayout>
    <!-- Card Section -->
    <div class="max-w-4xl px-4 sm:px-6 lg:px-8 mx-auto">
      <!-- <Link @click.prevent="back" class="inline-block p-2 rounded-full bg-slate-300 mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
        </svg>
      </Link> -->
      <form @submit.prevent="storeArticle">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow dark:bg-slate-900">
          <div class="pt-20 p-4 sm:p-7">
            <!-- Grid -->
            <div class="space-y-4 sm:space-y-6">
              <div class="space-y-2">
                <label for="af-submit-app-project-name" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                  Title
                </label>

                <input 
                v-model="form.title" 
                id="af-submit-app-project-name" 
                type="text" 
                class="py-2 px-3 pr-11 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                :class="{'border-red-600' : $page.props.errors.title}"
                placeholder="Title">
                <p v-if="$page.props.errors.title" class="text-xs text-red-600 mt-2" id="email-error">{{ $page.props.errors.title }}</p>
              </div>

              <div class="space-y-2">
                <label for="af-submit-app-category" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                  Category
                </label>

                <select v-model="form.category_id" id="af-submit-app-category" class="py-2 px-3 pr-9 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" :class="{'border-red-600' : $page.props.errors.category_id}">
                  <option value="">Select Category</option>
                  <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                </select>
                <p v-if="$page.props.errors.category_id" class="text-xs text-red-600 mt-2">{{ $page.props.errors.category_id }}</p>
              </div>

              <div class="space-y-2">
                <label for="af-submit-app-description" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                  Description
                </label>

                <textarea v-model="form.description" id="af-submit-app-description" class="py-2 px-3 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" rows="6" :class="{'border-red-600' : $page.props.errors.description}" placeholder="Description"></textarea>
                <p v-if="$page.props.errors.description" class="text-xs text-red-600 mt-2">{{ $page.props.errors.description }}</p>
              </div>
            </div>
            <!-- End Grid -->

            <div class="mt-5">
              <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                Submit Article
              </button>
            </div>
          </div>
        </div>
        <!-- End Card -->
      </form>
    </div>
    <!-- End Card Section -->
  </AdminLayout>
</template>

<script>
  import AdminLayout from '../../../Layout/AdminLayout.vue'
  import { reactive } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  import { Link } from '@inertiajs/inertia-vue3';
  // import { router } from '@inertiajs/vue3'

  export default {
    components: {
      AdminLayout,
      Link
    },

    props: {
      categories: Array,
    },

    methods: {
      back(){
        window.history.back();
      }
    },

    setup(){
      const form = reactive({
        title: '',
        category_id: '',
        description: '',
      })

      const storeArticle = () => {
        Inertia.post('/admin/articles', {
          title: form.title,
          category_id: form.category_id,
          description: form.description,
        })
      }

      return {
        form,
        storeArticle
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>