<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\ExpenseStoreRequest;
use App\Http\Requests\Expense\ExpenseUpdateRequest;
use App\Http\Requests\FileRequest;
use App\Http\Requests\ReportRequest;
use App\Models\Company;
use App\Models\Expense;
use App\Services\ExpenseService;
use Exception;
use Illuminate\Http\RedirectResponse;

class ExpenseController extends Controller
{
    public function __construct(private readonly ExpenseService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::paginate("10");
        $companies = Company::all()->pluck('name', 'id');
        return view('expense.index', compact('expenses', 'companies'));
    }

    public function report(ReportRequest $request)
    {
        try {
            $data = $this->service->report(array_filter($request->validated()));
            $data["expenses"] = $data["items"];
            return view('expense.index', $data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Rapor Oluşturulurken Bir Hata Oluştu");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all()->pluck('name', 'id');
        return view('expense.create', compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with('success', 'Gider Kaydı Başarıyla Eklendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $companies = Company::all()->pluck('name', 'id');
        $licences = $expense->company?->licences->pluck('name', 'id') ?: [];
        return view('expense.edit', compact('expense', 'companies', "licences"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseUpdateRequest $request, Expense $expense): RedirectResponse
    {
        try {
            $this->service->update($request->validated(), $expense);
            return redirect()->back()->with('success', 'Gider Kaydı Başarıyla Güncellendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function files(Expense $expense)
    {
        return view('expense.files', compact('expense'));
    }

    public function storeFiles(FileRequest $request, Expense $expense): string
    {
        try {
            $this->service->fileUpload($request->validated(), $expense);
            return redirect()->back()->with('success', 'Dosya Başarıyla Eklendi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteFile(Expense $expense, string $file): RedirectResponse
    {
        try {
            $expense->media()->findOrFail($file)->delete();
            return redirect()->back()->with('success', 'Dosya Başarıyla Silindi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense): RedirectResponse
    {
        try {
            $this->service->delete($expense);
            return redirect()->route("expense.index")->with('success', 'Gider Kaydı Başarıyla Silindi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
