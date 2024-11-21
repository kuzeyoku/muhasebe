<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contract\ContractStoreRequest;
use App\Http\Requests\Contract\ContractUpdateRequest;
use App\Models\Company;
use App\Models\Contract;
use App\Services\ContractService;
use Illuminate\Http\RedirectResponse;

class ContractController extends Controller
{
    public function __construct(private readonly ContractService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::paginate(10);
        return view('admin.contract.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all()->pluck('name', 'id');
        return view('admin.contract.create', compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->back()->with('success', 'Sözleşme Başarıyla Eklendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $companies = Company::all()->pluck('name', 'id');
        $licences = $contract->company->licences->pluck("number", "id");
        return view('admin.contract.edit', compact('contract', 'companies', 'licences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractUpdateRequest $request, Contract $contract)
    {
        try {
            $this->service->update($request->all(), $contract);
            return redirect()->back()->with('success', 'Sözleşme Başarıyla Güncellendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        try {
            $contract->delete();
            return redirect()->back()->with('success', 'Sözleşme Başarıyla Silindi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
