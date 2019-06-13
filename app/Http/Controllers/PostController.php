<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(!empty($request->get('category_id'))) {
            $categoryId = $request->get('category_id');
            $posts = Post::where('category_id', $categoryId)->get();

        } else {
            $categoryId = 0;
            $posts = Post::all();
        }

        $categories = Category::pluck('category_name', 'id');

        return view('posts.index', compact('posts', 'categories', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id');
        $authorName = Auth::user()->name;

        return view('posts.create', compact('categories', 'authorName'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|max:255',
            'category_id'=>'required',
            'long_description'=>'required|max:65535',
            'short_description'=>'required|max:255'
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'user_id' => Auth::id(),
            'category_id' => $request->get('category_id'),
            'short_description' => $request->get('short_description'),
            'long_description' => $request->get('long_description'),
            'img_name' => rand(0, 4)
        ]);

        $post->save();
        return redirect('/posts')->with('success', 'Post Saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::query()->with('User')->find($id);
        $categories = Category::pluck('category_name', 'id');

        return view('posts.edit', compact('post', 'categories'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required|max:255',
            'category_id'=>'required',
            'short_description'=>'required|max:255',
            'long_description'=>'required|max:65535'
        ]);

        $post = Post::query()->find($id);
        $post->title =  $request->get('title');
        $post->category_id = $request->get('category_id');
        $post->short_description = $request->get('short_description');
        $post->long_description = $request->get('long_description');
        $post->save();

        return redirect('/posts')->with('success', 'Post updated.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::query()->find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted.');
    }
}
