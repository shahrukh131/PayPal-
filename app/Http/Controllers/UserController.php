<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    public function create()
    {

        return view('users.create');

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',

            'email'=>'required',
            'contact_no'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png',
            'password'=>'required'

        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();

        $image->move('uploads/posts', $image_new_name);


        $user = User::create([
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'image' => 'uploads/posts/' . $image_new_name,
            'password'=>Hash::make($request->password)



        ]);
        Session::flash('success','successfully created.');
         return redirect()->route('users.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('users',$user);

    }


    public function update(Request $request,$id)
    {
         $this->validate($request,[
            'name'=>'required',

            'email'=>'required',
            'contact_no'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png',
            'password'=>'required'

        ]);

        $user = User::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;

            $image_new_name = time() . $image->getClientOriginalName();

            $image->move('uploads/posts', $image_new_name);

            $user->image = 'uploads/posts/' . $image_new_name;
        }

        $user->name = $request->name;
        $user->email =$request->email;
        $user->contact_no =$request->contact_no;
        $user->password = $request->password;
        $user->address = $request->address;

        $user->save();

        // dd($request->all());
        Session::flash('success','successfully updated.');

        return redirect()->route('users.index');



    }


      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success','Successfully Deleted');
        return redirect()->route('users.index');

    }


}
