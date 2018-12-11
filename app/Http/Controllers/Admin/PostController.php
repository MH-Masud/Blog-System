<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\category;
use App\post;
use App\tag;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('backend.pages.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $tags = tag::all();
        return view('backend.pages.post.post',compact('categories','tags'));
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
             'title'=>'required',
             'short_description'=>'required',
             'long_description'=>'required'
         ]);

            if ($request->hasFile('image')) {
                
                $post_image = $request->file('image');
                $image_name = str_random(20);
                $image_ext = strtolower($post_image->getClientOriginalExtension());
                $image_fullname = $image_name.'.'.$image_ext;
                $image_path = 'public/BlogImages/';
                $image_url = $image_path.$image_fullname;
                $image_store = $post_image->move($image_path,$image_fullname);

                if ($image_store) {

                    $post = new post();
                    $post->title = $request->title ;
                    $post->slug = $request->slug ;
                    $post->short_description = $request->short_description ;
                    $post->long_description = $request->long_description ;
                    $post->publication_status = $request->publication_status ;
                    $post->posted_by =  $request->posted_by;
                    $post->image = $image_url;
                    $post->save();

                    $post->tags()->sync($request->tags);
                    $post->categories()->sync($request->categories);

                    Toastr::success('Post Save Successfull','message');
                    return redirect()->route('post.index');
                }

            }else{

                $post = new post();
                $post->title = $request->title ;
                $post->slug = $request->slug ;
                $post->short_description = $request->short_description ;
                $post->long_description = $request->long_description ;
                $post->publication_status = $request->publication_status ;
                $post->posted_by =  $request->posted_by;

                $post->save();

                $post->tags()->sync($request->tags);
                $post->categories()->sync($request->categories);

                Toastr::success('Post Save Successfull','message');
                return redirect()->route('post.index');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_post = post::find($id);
        return view ('backend.pages.post.view',compact('show_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $categories = category::all();
            $tags = tag::all();
            $edit_post = post::with('tags','categories')
            ->where('id',$id)
            ->first();       
            return view('backend.pages.post.edit',compact('edit_post','categories','tags'));
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
            if ($request->hasFile('new_image')) {

                $update_post = post::find($id);

                if ($update_post->image == NULL ) {

                    $post_img = $request->file('new_image');
                    $img_name = str_random(20);
                    $img_ext = strtolower($post_img->getClientOriginalExtension());
                    $img_full_name = $img_name.'.'.$img_ext;
                    $img_path = 'public/BlogImages/';
                    $img_url = $img_path.$img_full_name;
                    $img_store = $post_img->move($img_path,$img_full_name);

                    if ($img_store) {
                        
                        $update_post->title = $request->title ;
                        $update_post->slug = $request->slug ;
                        $update_post->short_description = $request->short_description ;
                        $update_post->long_description = $request->long_description ;
                        $update_post->publication_status = $request->publication_status ;
                        $update_post->posted_by = $request->posted_by;
                        $update_post->image = $img_url;
                        $update_post->save();

                        $update_post->tags()->sync($request->tags);
                        $update_post->categories()->sync($request->categories);

                        Toastr::success('Post Update Successfull','message');
                        return redirect()->route('post.index');
                    }
                }else{

                    $update_post = post::find($id);
                    unlink($update_post->image);

                    $post_img = $request->file('new_image');
                    $img_name = str_random(20);
                    $img_ext = strtolower($post_img->getClientOriginalExtension());
                    $img_full_name = $img_name.'.'.$img_ext;
                    $img_path = 'public/BlogImages/';
                    $img_url = $img_path.$img_full_name;
                    $img_store = $post_img->move($img_path,$img_full_name);

                    if ($img_store) {
                        
                        $update_post->title = $request->title ;
                        $update_post->slug = $request->slug ;
                        $update_post->short_description = $request->short_description ;
                        $update_post->long_description = $request->long_description ;
                        $update_post->publication_status = $request->publication_status ;
                        $update_post->posted_by = $request->posted_by;
                        $update_post->image = $img_url;
                        $update_post->save();

                        $update_post->tags()->sync($request->tags);
                        $update_post->categories()->sync($request->categories);

                        Toastr::success('Post Update Successfull','message');
                        return redirect()->route('post.index');
                    }
                }

            }else{
                $update_post = post::find($id);
                $update_post->title = $request->title ;
                $update_post->slug = $request->slug ;
                $update_post->short_description = $request->short_description ;
                $update_post->long_description = $request->long_description ;
                $update_post->publication_status = $request->publication_status ;
                $update_post->posted_by = $request->posted_by;
                $update_post->image = $update_post->image;
                $update_post->save();
                
                $update_post->tags()->sync($request->tags);
                $update_post->categories()->sync($request->categories);

                Toastr::success('Post Update Successfull','message');
                return redirect()->route('post.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $delete_post = post::find($id);

            if ($delete_post->image == NULL ) {
                
                $delete_post->delete();
                Toastr::warning('Post Delete Successfull','message');
                return redirect()->route('post.index');
            }
            else{
                
                unlink($delete_post->image);
                $delete_post->delete();
                Toastr::warning('Post Delete Successfull','message');
                return redirect()->route('post.index');
            }
    }
}
