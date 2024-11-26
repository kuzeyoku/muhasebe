<?php

namespace App\Http\Controllers;

use App\Http\Requests\Debit\DebitStoreRequest;
use App\Http\Requests\Debit\DebitUpdateRequest;
use App\Models\Debit;
use App\Services\DebitService;
use Illuminate\Http\RedirectResponse;

class DebitController extends Controller
{
    public function __construct(private readonly DebitService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debits = Debit::paginate(10);
        return view('debit.index', compact('debits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('debit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DebitStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with('success', 'Borç Kaydı Başarıyla Oluşturuldu');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Debit $debit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debit $debit)
    {
        return view('debit.edit', compact('debit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DebitUpdateRequest $request, Debit $debit): RedirectResponse
    {
        try {
            $this->service->update($request->validated(), $debit);
            return redirect()->back()->with('success', 'Borç Kaydı Başarıyla Güncellendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debit $debit): RedirectResponse
    {
        try {
            $this->service->delete($debit);
            return redirect()->back()->with('success', 'Borç Kaydı Başarıyla Silindi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
