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
        return response()->json(array('status' => 200, 'profile' => $profile, 'skills' => $skills));
    }
}
