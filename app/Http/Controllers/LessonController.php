<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $courseId = $request->get("course_id");
        $lessons = Lesson::query();
        if($courseId) {
            $lessons = Lesson::whereCourseId($courseId)->get()->toArray();
        }
        else {
            $lessons = $lessons->get();
        }
        return response()->json(['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $lesson = new Lesson($request->validated());
        $status = $lesson->save();
        return response()->json((object)['status' => $status ? 'ok' : 'error']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return response()->json([
            'lesson' => $lesson,
            'materials' => $lesson->materials()->get()->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $status = $lesson->update($request->validated());
        return response()->json((object)['status' => $status ? 'ok' : 'error']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
