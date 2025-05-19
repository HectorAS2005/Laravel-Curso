<?php

namespace App\Http\Controllers\web;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function show(Post $post)
    {
        return view('web.blog.show', compact('post'));
    }
}
