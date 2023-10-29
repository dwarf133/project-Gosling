<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::query()->each(function (User &$user){
            $sum = $user->results()->sum('score');
            $avg = $user->results()->sum('score');
        });
        return view('pages.dashboard');
    }
}
