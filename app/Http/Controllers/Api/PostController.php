<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function all() {

        // if(Cache::has('post_all')) {
        //     return response()->json(Cache::get('post_all'));
        // } else {
        //     $posts = Post::all();
        //     Cache::put('post_all', $posts, 60 * 60 * 24); // 1 día
        //     return response()->json($posts);
        // }

        return response()->json(Cache::remember('post_page_1', now()->addMinute(), function () {
            return Post::paginate(50);  // Cambia 50 por el número que quieras
        }));
    }


    public function index()
    {
        return response()->json(Post::paginate(10));
    }

    public function alll()
    {
        return response()->json(Post::get());
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("ok");
    }
    
    // public function slug(Post $post)
    // {
        
    //     return response()->json($post);
    // }
}
