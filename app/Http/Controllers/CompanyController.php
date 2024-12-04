<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Services\CompanyService;
use Exception;
use Illuminate\Http\RedirectResponse;

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
        return view("company.index", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all()->pluck("name", "id");
        return view("company.create", compact("cities"))->render();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with("success", "Firma Başarıyla Eklendi");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $unpaidInvoices = $company->invoices()->unpaid()->betweenDueDate(7)->get();
        $overdueInvoices = $company->invoices()->overdue()->get();
        return view("company.show", compact("company", "unpaidInvoices", "overdueInvoices"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $cities = City::all()->pluck("name", "id");
        $districts = $company->city_id ? $company->city->districts->pluck("name", "id") : [];
        return view("company.edit", compact("company", "cities", "districts"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        try {
            $this->service->update($request->validated(), $company);
            return redirect()->back()->with("success", "Firma Başarıyla Güncellendi");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        try {
            $this->service->delete($company);
            return redirect()->back()->with("success", "Firma Başarıyla Silindi");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
