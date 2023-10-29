<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.users', ['users' => User::all(), 'name' => 'users']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user-form', ['name' => 'user']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->fio = $request->fio;
        $password = Str::random(10);
        $user->password = Hash::make($password);

        $company = new Company();
        $company->name = $request->name;
        $company->description = 'Описание компании';
        $company->logo_path = 'logo';
        $company->color = 1;
        $company->save();

        $department = new Department();
        $department->name = 'Отдел тестирования';
        $department->description = 'Описание отдела';
        $department->parent_id = -1;
        $department->company_id = $company->id;
        $department->save();

        $user->company_id = $company->id;
        $user->department_id = $department->id;

        $user->save();

        return response()->json(['email' => $user->email, 'password' => $password]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.user', ['user' => $user, 'name' => 'user']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }
}
