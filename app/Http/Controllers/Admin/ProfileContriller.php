<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileContriller extends Controller
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
        //
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
           'old_password'=>['required','string','min:6'],
           'new_password'=>['required','string','min:6'],
           'confirm_password'=>['required','string','min:6'],
        ]);
        if ($request->new_password == $request->confirm_password) {

            $pass = $request->old_password;
            $id = $request->admin_id;
            $admin = admin::find($id);

            if (Hash::check($pass, $admin->password)) {
                
                $admin->password = bcrypt($request->new_password);
                $admin->save();
                Toastr::success('Password Change Successfull.','message');
                return redirect()->route('profile.edit',$request->admin_id);
            }
            else
            {
                Toastr::warning('Old Password Is Incorrect.','message');
                return redirect()->route('profile.edit',$request->admin_id);
            }
        }
        else
        {
            Toastr::warning('New password combination Did Not Match','message');
            return redirect()->route('profile.edit',$request->admin_id);
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
        $admin = admin::find($id);
        return view('backend.pages.profile.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = admin::find($id);
        return view('backend.pages.profile.edit',compact('admin'));
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
        $admin = admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->save();
        return redirect()->route('admin.home');
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
