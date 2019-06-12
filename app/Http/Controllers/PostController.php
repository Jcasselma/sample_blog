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
    public function index()
    {
        $posts = POST::all();

        return view('posts.index', compact('posts'));
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
            'title'=>'required',
            'category_id'=>'required',
            'long_description'=>'required'
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'user_id' => Auth::id(),
            'category_id' => $request->get('category_id'),
            'short_description' => $request->get('short_description'),
            'long_description' => $request->get('long_description')
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
        $post = Post::query()->find($id);
        return view('posts.edit', compact('post'));
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
            'title'=>'required',
            'category_id'=>'required',
            'long_description'=>'required'
        ]);

        $post = Post::query()->find($id);
        $post->title =  $request->get('title');
        $post->user_id = $request->get('user_id');
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
