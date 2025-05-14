<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;

use App\Models\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));
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

        // $post = Post::find(1);
        // $category = $post->category;
        // return 'Index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request){
        // Validate the request data
        // $validated = Validator::make($request->all(), [
        //     'title' => 'required|min:5|max:255',
        //     'slug' => 'required|min:5|max:255',
        //     'content' => 'required|min:7',
        //     'category_id' => 'required|integer',
        //     'description' => 'nullable|min:7',
        //     'posted' => 'required',
        // ]);
        // dd($validated->fails()); // True if validation fails, false if it passes

        /* $request->validate([
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255',
            'content' => 'required|min:7',
            'category_id' => 'required|integer',
            'description' => 'nullable|min:7',
            'posted' => 'required',
        ]);  */

        Post::create($request->validated());
        return to_route('post.index');

        /* Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'posted' => $request->posted,
        ]); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        // image
        if(isset($data['image']))
            $data['image'] = $filename = time().'.'.$data['image']->extension();
            $request->image->move(public_path('uploads/posts'), $filename);
        // image
        $post->update($data);
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index');
    }
}
