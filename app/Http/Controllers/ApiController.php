<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function ProfileData()
    {
        $profile = About::first();
        $skills = Skill::all();
        $response = [
            'status' => 200,
            'message' => 'Details',
            'profile' => $profile,
            'skills' => $skills
        ];
        return response()->json($response);
    }

    public function login(LoginRequest $request)
    {
        $input = $request->validated();
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            $user = Auth::guard('admin')->user();
            if ($user->role == 1) {
                $roleName = 'Admin';
            } else if ($user->role == 2) {
                $roleName = 'Finance';
            } else {
                $roleName = 'Administrative';
            }

            $userData = array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role_id' => $user->role,
                'role_name' => $roleName
            );

            return response()->json(array('status' => 200, 'message' => 'Logged in successfully', 'userDetails' => $userData));
        } else {
            return response()->json(array('status' => 404, 'message' => 'Incorrect Username or Password', 'userDetails' => []));
        }
    }
}
