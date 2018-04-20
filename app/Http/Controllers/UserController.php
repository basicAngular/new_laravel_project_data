<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {
    public function login(){
        //return "hi";
        return view('user.login');
    }

    public function signup(Request $request){
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json($validator->getMessageBag(), 301);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $this->throwValidationException(
                $request, $validator
            );
        }else{
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata)) {
                    return Redirect::to('dashboard')->with('message', 'You are now logged in!');
                }
            }else{
                if ($request->ajax()) {
                    $validator->errors()->add("login_error", "Username or password doesn't match");
                    return response()->json($validator->getMessageBag(), 301);
                }
            }

        }

    }

    public function logout(){
        Auth::logout();
        // return redirect()->to('/')->with('message', 'Your are logged out!');
        return redirect()->route('login');
    }
}







