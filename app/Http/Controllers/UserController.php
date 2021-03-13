<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->paginate(10);
        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
        'name'=>'required',
        'email'=>'required|unique:users',
        'password'=>'required|min:3'

    ]);
        $data = $request->all();
        $data['visible_password']=$data['password'];
        $data['password']=bcrypt($data['password']);
        $data['is_admin']=0;
        User::create($data);
        return redirect()->back()->with('message','User created successfully'); 
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
        $user = User::find($id);
        return view('backend.user.edit',compact('user'));
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
          $this->validate($request,[
            'name'=>'required',
    
        ]);
            $data = User::find($id);
            $data['name']=$request->name;
            $data['occupation']=$request->occupation;
            $data['phone']=$request->phone;
            $data['address']=$request->address;
            if($data['password'])
            {
                $user['password']=bcrypt($request->password);
                 $data['visible_password']=$request->password;
            }
//            dd($data);
            $data->update();
            return redirect()->route('user.index')->with('message','User updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if(auth()->user()->id==$id)
        // {
        //     return redirect()->back('message'.'You cannot delete yourself');
        // }
        $user = User::findorFail($id);
        $user->delete();
        return redirect(route('user.index'))->with('messages','User deleted successfully');
    }
}
