<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Create a new post
        /* Post::create(
            [
                'title' => 'new test title',
                'slug' => 'test slug',
                'content' => 'test content',
                'category_id' => 1,
                'description' => 'test description',
                'posted' => 'no',
                'image' => 'test image',
            ]
        ); */

        // Update a post
        /* $post->update(
            [
                'title' => 'new test title',
            ]
        ); */

        // Delete a post
        /* $post = Post::find(1)->delete(); */

        $post = Post::find(1);
        $category = $post->category;
        dd($category->posts[1]->title);
        return 'Index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
