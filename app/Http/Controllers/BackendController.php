<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function index() {
        return view('backend.pages.dashboard');
    }

    public function loginPage() {
        return view('backend.pages.login');
    }

    public function login(LoginRequest $request) {
        $input = $request->validated();
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));

        } else {
            return redirect(route('login'))->with('error', 'Login details are not valid');
        }
    }

    public function signupPage() {
        return view('backend.pages.signup');
    }

    public function signup(SignupRequest $request) {
        $input = $request->validated();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password'])
        ]);

        return redirect(route('login'))->with('msg', 'User saved successfully');
    }
}
