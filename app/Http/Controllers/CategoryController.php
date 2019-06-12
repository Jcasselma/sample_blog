<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesIndex = Category::all();

        return view('categories.index', compact('categoriesIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id');
//        dd($categories);

        return view('categories.create', compact('categories'));
    }

// YOU STOPPED HERE
//YOU WERE TRYING TO APPEND A NODE TO A PARENT NODE

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name'=>'required',
            'parent_id' => 'required'
        ]);

        //insert validate call + save node

        $node = new Category([
            'category_name' => $request->post('category_name')
        ]);
        $node->save();

        $parentId= $request->get('parent_id');

        if ($parentId == 0) {
            $node->saveAsRoot();
        }
        else {
            $parentNode = Category::find($parentId);
            $parentNode->appendNode($node);
        }

        return redirect('/categories')->with('success', 'Categories Saved.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::pluck('category_name', 'id');

        return view('categories.edit', compact('category', 'categories'));
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
            'category_name'=>'required',
        ]);

        $category = Category::find($id);
        $category->category_name =  $request->get('category_name');

        // Code for changing parent node
//        $newParentId = $request->get('parent_id');
//        dd($newParentId);
//        $parentNode = Category::find($newParentId);
//        $parentNode->appendNode($category);

        $category->save();

        return redirect('/categories')->with('success', 'Category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $node = Category::query()->find($id);
        $node->delete();

        return redirect('/categories')->with('success', 'Category deleted.');
    }
}
