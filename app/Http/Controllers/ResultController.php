<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.results', [
            'results' => Result::all(),
            'name' => 'Результаты',
            'courses' => Course::coursesList(),
            'users' => User::usersList(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.result-form', ['name' => 'result']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        $file = null;
        $fileName = "";
        if($request->file('document')) {
            $file = $request->file('document');
            $fileName = $file->hashName();
            $file->storeAs('public/results/', $fileName);
        }
        $result = new Result(array_merge(
           $request->validated(),
            isset($file) ? ["file_path" => 'storage/results/' . $fileName] : [],
            ['user_id' => Auth::id()],
            ['score' => '-1'],
        ));
        $result->save();
        return redirect()->route('results.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        return view('pages.result-form', ['name' => 'result', 'result' => $result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        $result->update($request->validated());
        return redirect()->route('results.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
