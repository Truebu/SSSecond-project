<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    //GET users
    public function index(){
        $countUser = User::all();
        if($countUser->count() == 0){
            return redirect()->to('user/signup');
        }
        return redirect()->to('user/login');
    }

    //GET returns view signup
    public function toSignup(){
        return view('signup');
    }

    //POST Signup
    public function signup(){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $newUser = request(['name', 'email', 'role', 'password']);
        $user = User::where('email','like','%' . $newUser['email'] . '%')->first();
        if (!is_null($user)){
            return back()->withErrors([
                'message' => 'invalid email',
            ]);
        }
        $newUser['password'] = md5($newUser['password']);

        if ($newUser['role'] == '0'){
            $newUser['role'] = 'admin';
        }
        $finishUser = User::create($newUser);

        auth()->login($finishUser);

        if(auth()->user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        return redirect()->to('/');
    }

    //GET returns view login
    public function toLogin(){
        return view('login');
    }

    //POST Login
    public function login(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $input= request(['email', 'password']);
        $user = User::where('email','like','%' . $input['email'] . '%')->first();
        if (!is_null($user)&&!md5($input['password']) == $user['password']){
            return back()->withErrors([
                'message' => 'Email or password is incorrect',
            ]);
        }
        auth()->login($user);

        if(auth()->user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        return redirect()->to('/');
    }

    public function logout() {
        auth()->logout();
        return redirect()->to('/user');
    }
}
