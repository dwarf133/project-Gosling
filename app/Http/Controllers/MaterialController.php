<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Lesson;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.materials', [
            'materials' => Material::all(),
            'name' => 'Materials',
            'lessons' => Lesson::lessonsList(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.material-form', ['name' => 'material']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        $file = null;
        $fileName = "";
        if($request->file('document')) {
            $file = $request->file('document');
            $fileName = $file->hashName();
            $file->storeAs('public/materials/', $fileName);
        }
        $material = new Material(array_merge(
            $request->validated(),
            isset($file) ? ["document_path" => 'storage/materials/' . $fileName] : []
        ));
        $material->save();
        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('pages.material-show', ['material' => $material, 'name' => 'show material', 'lessons' => Lesson::lessonsList(),]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('pages.material-form', ['material' => $material, 'name' => 'lesson']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
