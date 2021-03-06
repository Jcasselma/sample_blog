<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public function index(Request $request)
    {

        if(!empty($request->get('category_id'))) {
            $categoryId = $request->get('category_id');
            $posts = Post::where('category_id', $categoryId)->get();

        } else {
            $categoryId = 0;
            $posts = Post::all();
        }

        $categories = Category::pluck('category_name', 'id')->reverse();

        return view('blog.list', compact('posts', 'categories', 'categoryId'));
    }

    public function show($id)
    {

        $post = Post::where('id', $id)->first();
        return view('blog.detail', compact('post', 'categories', 'categoryId'));

    }
}
