<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('pages.lessons', [
            'lessons' => Lesson::all(),
            'name' => 'Lesson',
            'courses' => Course::coursesList(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.lesson-form', ['name' => 'lesson']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $lesson = new Lesson($request->validated());
        $status = $lesson->save();
        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return view("pages.lessons-show", [
            'name' => "lesson's materials",
            'lesson' => $lesson,
            'materials' => $lesson->materials()->get()->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('pages.material-form', ['lesson' => $lesson, 'name' => 'lesson']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $status = $lesson->update($request->validated());
        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
