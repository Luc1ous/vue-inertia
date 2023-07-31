<template>
  <div class="h-full">
    <div class="dark:bg-slate-900 bg-gray-100 flex h-full items-center py-16">
      <main class="w-full max-w-md mx-auto p-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
          <div class="p-4 sm:p-7">
            <div class="text-center">
              <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
              <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Don't have an account yet?
                <Link class="text-blue-600 decoration-2 hover:underline font-medium" href="/register">
                  Sign up here
                </Link>
              </p>
            </div>
            <div class="mt-5">
              <!-- Form -->
              <form @submit.prevent="storeLogin">
                <div class="grid gap-y-4">
                  <!-- Form Group -->
                  <div>
                    <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                    <div class="relative">
                      <input 
                      v-model="form.email"
                      type="email" 
                      id="email" 
                      name="email" 
                      class="py-3 px-4 block w-full border-gray-200 border-[1px] rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                      :class="{'border-red-600' : $page.props.errors.email}" 
                      aria-describedby="email-error">
                      <div v-if="$page.props.errors.email" class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                        <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                      </div>
                    </div>
                    <p v-if="$page.props.errors.email" class="text-xs text-red-600 mt-2" id="email-error">{{ $page.props.errors.email }}</p>
                  </div>
                  <!-- End Form Group -->

                  <!-- Form Group -->
                  <div>
                    <div class="flex justify-between items-center">
                      <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                    </div>
                    <div class="relative">
                      <input 
                      v-model="form.password"
                      type="password" 
                      id="password" 
                      name="password" 
                      class="py-3 px-4 block w-full border-gray-200 border-[1px] rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" 
                      :class="{'border-red-600' : $page.props.errors.password}"
                      aria-describedby="password-error">
                      <div v-if="$page.props.errors.password" class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                        <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                      </div>
                    </div>
                    <p v-if="$page.props.errors.password" class="text-xs text-red-600 mt-2" id="password-error">{{ $page.props.errors.password }}</p>
                  </div>
                  <!-- End Form Group -->
                  <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Sign in</button>
                </div>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
  import { Link } from '@inertiajs/inertia-vue3'
  import { reactive } from 'vue';
  import { Inertia } from '@inertiajs/inertia';

  export default {
    components: {
      Link
    },

    props: {
      errors: Object,
    },

    setup(){
      const form = reactive({
        email: '',
        password: ''
      })

      const storeLogin = () => {
        Inertia.post('/login', {
          email: form.email,
          password: form.password
        })
      }

      return {
        form,
        storeLogin
      }
    }
  }
</script>