<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    public function __construct(private readonly CompanyService $service)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view("admin.company.index", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = \App\Models\City::all()->pluck("name", "id");
        return view("admin.company.create", compact("cities"))->render();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with("success", "Firma Başarıyla Eklendi");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

//    /**
//     * Display the specified resource.
//     */
//    public function show(Company $company)
//    {
//        return view("admin.company.show", compact("company"));
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $cities = City::all()->pluck("name", "id");
        $districts = $company->city_id ? District::where("city_id", $company->city_id)->pluck("name", "id") : [];
        return view("admin.company.edit", compact("company", "cities", "districts"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        try {
            $this->service->update($request->validated(), $company);
            return redirect()->back()->with("success", "Firma Başarıyla Güncellendi");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->service->delete($company);
            return redirect()->back()->with("success", "Firma Başarıyla Silindi");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}