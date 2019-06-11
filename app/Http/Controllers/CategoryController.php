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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

// YOU STOPPED HERE
//YOU WERE TRYING TO APPEND A NODE TO A PARENT NODE

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name'=>'required',
            'parent_id' => 'required'
        ]);

        //insert validate call

        $node = new Category([
            'category_name' => $request->post('category_name')
        ]);
        $node->save();

        $parentId= $request->get('parent_id');

        // if parent_id == 0 set as parent
        if ($parentId == 0) {
            $node->saveAsRoot();
        }
        else {
            $parent_node->append($node);
        }
        // else set parent to id


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
