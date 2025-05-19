<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index() {
        return response()->json(Category::paginate(10));
    }

    public function all()
    {
        return response()->json(Category::get());
    }


    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));

    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    } 

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
    
    public function posts(Category $category)
    {
        // $posts = Post::join('categories', "categories.id", "=", "posts.category_id")
        //     ->select("posts.*", "categories.title as category")
        //     ->where('categories.id', $category->id)
        //     ->get();

        $posts = Post::with("category")
            ->where('category_id', $category->id)
            ->get();

        return response()->json($posts);
    }
}
