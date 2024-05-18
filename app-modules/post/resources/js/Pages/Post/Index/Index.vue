<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { Post } from "../../../types/model";

defineProps<{
  posts?: Post[];
}>();
</script>

<template>
  <Head title="Post - Index" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post - Index
      </h2>
    </template>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="py-4">
          <Link
            :href="route('posts.create')"
            class="btn btn-primary text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded"
          >
            Create Post
          </Link>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div>
            <table class="w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Title
                  </th>

                  <th
                    class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Actions
                  </th>
                </tr>
              </thead>

              <tbody class="bg-white divide-y divide-gray-200">
                <tr
                  v-for="post in posts"
                  :key="post.id"
                  class="cursor-pointer hover:bg-gray-50"
                >
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ post.title }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <Link
                      :href="route('posts.show', post)"
                      class="text-indigo-600 hover:text-indigo-900 mr-4"
                    >
                      Details
                    </Link>

                    <Link
                      :href="route('posts.edit', post)"
                      class="text-indigo-600 hover:text-indigo-900 mr-4"
                    >
                      Edit
                    </Link>

                    <button
                      @click="router.delete(route('posts.destroy', post))"
                      class="text-red-500 hover:text-indigo-900 mr-4"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
