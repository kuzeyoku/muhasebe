<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Requests\Income\IncomeStoreRequest;
use App\Http\Requests\Income\IncomeUpdateRequest;
use App\Models\Company;
use App\Models\Income;
use App\Services\IncomeService;
use Exception;
use Illuminate\Http\RedirectResponse;

class IncomeController extends Controller
{
    public function __construct(private readonly IncomeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::paginate(10);
        return view('income.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all()->pluck('name', 'id');
        return view('income.create', compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with('success', 'Gelir Kaydı Başarıyla Eklendi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function files(Income $income)
    {
        return view('income.files', compact('income'));
    }

    public function storeFiles(FileRequest $request, Income $income): string
    {
        try {
            $this->service->fileUpload($request->validated(), $income);
            return redirect()->back()->with('success', 'Dosya Başarıyla Eklendi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteFile(Income $income, string $file): RedirectResponse
    {
        try {
            $income->media()->findOrFail($file)->delete();
            return redirect()->back()->with('success', 'Dosya Başarıyla Silindi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $companies = Company::all()->pluck('name', 'id');
        $licences = $income->company?->licences->pluck('name', 'id') ?: [];
        return view('income.edit', compact('income', 'companies', "licences"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeUpdateRequest $request, Income $income): RedirectResponse
    {
        try {
            $this->service->update($request->validated(), $income);
            return redirect()->back()->with('success', 'Gelir Kaydı Başarıyla Güncellendi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income): RedirectResponse
    {
        try {
            $this->service->delete($income);
            return redirect()->back()->with('success', 'Gelir Kaydı Başarıyla Silindi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
