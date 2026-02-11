<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('login')->withError('Enter Correct Credential');
        // dd($request->all());
    }
    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }
}
