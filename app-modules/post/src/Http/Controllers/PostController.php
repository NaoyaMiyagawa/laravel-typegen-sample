<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Modules\Post\Enums\PostStatus;
use Modules\Post\Http\Requests\PostStoreRequest;
use Modules\Post\Http\Requests\PostUpdateRequest;
use Modules\Post\Models\Post;

class PostController
{
    public function index(): Response
    {
        $posts = Post::query()
            ->orderByDesc('created_at')
            ->get();

        return Inertia::render('Post::Post/Index', [
            'posts' => $posts,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Post::Post/Create', []);
    }

    public function store(PostStoreRequest $request): RedirectResponse
    {
        Post::query()->create([
            ...$request->validated(),
            'status' => PostStatus::Draft,
            'user_id' => Auth::id(),
        ]);

        return redirect(route('posts.index'));
    }

    public function show(Request $request, Post $post): Response
    {
        return Inertia::render('Post::Post/Show', []);
    }

    public function edit(Request $request, Post $post): Response
    {
        return Inertia::render('Post::Post/Edit', [
            'post' => $post,
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect(route('posts.index'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
