<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;

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
}
