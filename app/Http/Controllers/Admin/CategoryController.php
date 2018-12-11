<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\category;
use Brian2694\Toastr\Facades\Toastr;
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
        $categories = category::paginate(10);
        return view('backend.pages.category.show',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           
           'name'=>'required',
           'slug'=>'required',
        ]);

        $category_info = new category();
        $category_info->name = $request->name;
        $category_info->slug = $request->slug;
        $category_info->save();
        Toastr::success('Category Save Successfull','Insert');
        return redirect()->route('category.index');
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
        $category_by_id = category::find($id);
        return view('backend.pages.category.edit',compact('category_by_id'));
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
        $update_category = category::find($id);
        
        $update_category->name = $request->name;
        $update_category->slug = $request->slug;
        $update_category->save();

        Toastr::info('Category Update Successfull','Update');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_destory = category::find($id);
        $category_destory->delete();
        Toastr::warning('Category Delete Successfull','Delete');
        return redirect()->route('category.index');
    }
}
