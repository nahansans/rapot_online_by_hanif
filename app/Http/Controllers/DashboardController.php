<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jum_siswa = User::where('level', 'SISWA')->count();
        return view('backend.index', compact('jum_siswa'));
    }
}
