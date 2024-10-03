<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Post::with('category')->get());
    }


    public function store(StorePostRequest $request): Post
    {
        return Post::create($request->all());
    }


    public function show(Post $post): JsonResponse
    {
        return response()->json($post);
    }


    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $post->update($request->all());

        return response()->json($post);
    }


    public function destroy(Post $post): Response
    {
        $post->delete();

        return response()->json(['message' => 'Post destroyed'], 204);
    }
}
