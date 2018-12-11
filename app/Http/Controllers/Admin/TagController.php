<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tag::paginate(10);
        return view('backend.pages.tag.show',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.tag.tag');
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

        $store_tag = new tag();
        $store_tag->name = $request->name;
        $store_tag->slug = $request->slug;
        $store_tag->save();
        Toastr::success('Tag Save Successfull','message');
        return redirect()->route('tag.index');
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
        $edit_tag = tag::find($id);
        return view('backend.pages.tag.edit',compact('edit_tag'));
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
        $update_tag = tag::find($id);
        $update_tag->name = $request->name;
        $update_tag->slug = $request->slug;
        $update_tag->save();
        Toastr::info('Tag Update Successfull','message');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_tag = tag::find($id);
        $delete_tag->delete();
        Toastr::warning('Tag Delete Successfull','message');
        return redirect()->route('tag.index');
    }
}
