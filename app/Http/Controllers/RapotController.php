<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class RapotController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('frontend.index', compact('user'));
    }
}
