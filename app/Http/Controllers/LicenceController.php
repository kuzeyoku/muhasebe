<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Requests\Licence\LicenceStoreRequest;
use App\Http\Requests\Licence\LicenceUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Licence;
use App\Services\LicenceService;
use Illuminate\Http\RedirectResponse;

class LicenceController extends Controller
{
    public function __construct(private readonly LicenceService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licences = Licence::paginate(10);
        return view('licence.index', compact('licences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        $companies = Company::all()->pluck('name', 'id');
        return view('licence.create', compact('cities', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenceStoreRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->validated());
            return redirect()->back()->with('success', 'Ruhsat Başarıyla Eklendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Licence $licence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licence $licence)
    {
        $cities = City::all()->pluck('name', 'id');
        $companies = Company::all()->pluck('name', 'id');
        $districts = $licence->city->districts->pluck('name', 'id');
        return view('licence.edit', compact('licence', 'cities', 'companies', "districts"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LicenceUpdateRequest $request, Licence $licence): RedirectResponse
    {
        try {
            $this->service->update($request->validated(), $licence);
            return redirect()->back()->with('success', 'Ruhsat Başarıyla Güncellendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function files(Licence $licence)
    {
        return view('licence.files', compact('licence'));
    }

    public function storeFiles(FileRequest $request, Licence $licence): RedirectResponse
    {
        try {
            $this->service->fileUpload($request->validated(), $licence);
            return redirect()->back()->with('success', 'Dosyalar Başarıyla Eklendi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteFile(Licence $licence, $media): RedirectResponse
    {
        try {
            $licence->media()->findOrFail($media)->delete();
            return redirect()->back()->with('success', 'Dosya Başarıyla Silindi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licence $licence)
    {
        try {
            $this->service->delete($licence);
            return redirect()->back()->with('success', 'Ruhsat Başarıyla Silindi');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
