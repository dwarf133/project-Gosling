<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::query()->get()->each(function (User &$user){
            $user->sum = $user->results()->sum('score');
            $user->avg = intval($user->results()->avg('score'));
            return $user;
        });

        return view('pages.dashboard', ['users' => $users]);
    }
}
