<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $usersDetails =  User::with('role')->where('is_deleted','0')->get();
        return view('user.user', compact('usersDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries =  DB::table("countries")->pluck("name","id");
        $role_lists = Role::all();
        return view('user.createUser',compact(['role_lists','countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->all();
        $this->validate($request, [
            'role_name' => 'required',
            'name' => 'required|regex:/[a-zA-Z]+/',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'password' =>'required',
            'city' => 'required',
            'mobile' => 'required|numeric',
            'zip_code' => 'required',
        ]);

        $user = new User();
        $user->role_id = $request->input('role_name');
        $user->name = $request->input('name');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('state');
        $user->zip_code = $request->input('zip_code');
        $user->mobile = $request->input('mobile');
        $user->contact = $request->input('contact');
        $user->password = $request->input('password');
        $user->status = '1';
        $user->is_deleted='0';
        //$user->user_id = auth()->user()->id;
        $user->save();
        return redirect('/user')->with('success','New User Created Successfully !!');
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

    private function throwValidationException($request, $validator)
    {

    }
}
