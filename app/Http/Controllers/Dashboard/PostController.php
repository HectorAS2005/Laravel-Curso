<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;

use App\Models\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('index', Post::class)) {
            return abort(403, 'No tienes permiso para ver los posts.');
        }

        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        
        if (Gate::denies('create', $post)) {
            return abort(403, 'No tienes permiso para ver los posts.');
        }

        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) {
        $post = new Post($request->validated());

        if (Gate::denies('create', $post)) {
            return abort(403, 'No tienes permiso para ver los posts.');
        }

        Auth::user()->posts()->save($post);

        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (Gate::denies('view', $post)) {
            return abort(403, 'No tienes permiso para ver los posts.');
        }

        return view('dashboard.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Si el Gate deniega acceso, abortar con 403
        if (Gate::denies('update', $post)) {
            return abort(403, 'No tienes permiso para editar este post.');
        }

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
        if (Gate::denies('delete', $post)) {
            return abort(403, 'No tienes permiso para editar este post.');
        }
        
        $post->delete();
        return to_route('post.index');
    }
}
