<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { Post } from "../../../types/model";

const props = defineProps<{
  post: Post;
}>();

const form = useForm({
  title: props.post.title,
  content: props.post.content,
});
</script>

<template>
  <Head title="Post - Edit" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post - Edit
      </h2>
    </template>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div>
            <form
              @submit.prevent="
                form.put(route('posts.update', { post: post.id }))
              "
            >
              <!-- title -->
              <div class="flex mb-4">
                <label for="title" class="w-[100px]">Title</label>
                <input type="text" id="title" v-model="form.title" />
                <div v-if="form.errors.title" class="text-red-500 text-xs">
                  {{ form.errors.title }}
                </div>
              </div>

              <!-- content -->
              <div class="flex mb-4">
                <label for="content" class="w-[100px]">Content</label>
                <textarea id="content" v-model="form.content" />
                <div v-if="form.errors.content" class="text-red-500 text-xs">
                  {{ form.errors.content }}
                </div>
              </div>

              <button
                type="submit"
                :disabled="form.processing"
                class="btn btn-primary text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded"
              >
                Save
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
