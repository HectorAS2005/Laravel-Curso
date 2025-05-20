<?php

namespace App\Http\Controllers\web;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(2); 
        return view('web.blog.index', compact('posts'));
    }

    public function show(Post $post) {
        if (Cache::has('post_show_'.$post->id)) {
            return Cache::get('post_show_'.$post->id);
        } else {
            $cacheView = view('web.blog.show', compact('post'))->render();
            Cache::put('post_show_'.$post->id, $cacheView); // 1 día
            return $cacheView;
        }
        // return view('web.blog.show', compact('post'));
    }
}
