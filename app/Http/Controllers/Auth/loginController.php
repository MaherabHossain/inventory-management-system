<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\loginRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
    	return view('login.login');
    }
    public function process( loginRequest $request ){

    	$data = $request->only('email','password');

    	if(Auth::attempt($data)){
    		return redirect()->to('dashboard');
    	}else{
    		return redirect()->to('login')->withErrors(['Invalid login']);
    	}
    }
    public function logout(){
    	Auth::logout();

    	return redirect()->to('login');
    }
}
