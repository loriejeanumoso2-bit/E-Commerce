<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type === 'admin') {
            return view('admin.dashboard');
        }

        return view('dashboard');
    }
}