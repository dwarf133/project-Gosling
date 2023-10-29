<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.company');
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
    public function store(StoreCompanyRequest $request)
    {
        $file = $request->file('logo_image');
        $fileName = $file->hashName();
        $file->storeAs('public/company_image', $fileName);
        $company = new Company([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'color' => $request->get('color'),
            'logo_path' => 'storage/company_image' . $fileName,
        ]);
        $company->save();

        $adminName = transliterator_transliterate('Any-Latin;Latin-ASCII;', $company->name);
        $adminName = str_replace(' ', '_', $adminName);
        $adminName = strtolower($adminName);

        $companyAdmin = new User([
            'name' => $adminName . "_admin",
            'fio' => 'админ',
            'email' => $adminName . '@' . $company->name . '.ru',
            'company_id' => $company->id,
        ]);
        $companyAdmin->save();

        return response($companyAdmin->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $file = $request->file('logo_image');
        $fileName = $file->hashName();
        $file->storeAs('public/company_image', $fileName);
        $company->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'color' => $request->get('color'),
            'logo_path' => 'storage/company_image' . $fileName,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
