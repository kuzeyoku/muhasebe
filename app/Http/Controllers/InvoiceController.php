<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Requests\Invoice\InvoiceStoreRequest;
use App\Http\Requests\Invoice\InvoiceUpdateRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Exception;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function __construct(private readonly InvoiceService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::paginate(10);
        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all()->pluck('name', 'id');
        return view('invoice.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with('success', 'Fatura Başarıyla Eklendi.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function files(Invoice $invoice)
    {
        return view('invoice.files', compact('invoice'));
    }

    public function storeFiles(FileRequest $request, Invoice $invoice): string
    {
        try {
            $this->service->fileUpload($request->validated(), $invoice);
            return redirect()->back()->with('success', 'Dosya Başarıyla Eklendi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteFile(Invoice $invoice, string $file): RedirectResponse
    {
        try {
            $invoice->media()->findOrFail($file)->delete();
            return redirect()->back()->with('success', 'Dosya Başarıyla Silindi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $companies = Company::all()->pluck('name', 'id');
        $licences = $invoice->company?->licences->pluck('number', 'id') ?: [];
        return view('invoice.edit', compact('invoice', 'companies', 'licences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice): RedirectResponse
    {
        try {
            $this->service->update($request->validated(), $invoice);
            return redirect()->back()->with('success', 'Fatura Başarıyla Güncellendi.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice): RedirectResponse
    {
        try {
            $this->service->delete($invoice);
            return redirect()->back()->with('success', 'Fatura Başarıyla Silindi.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
