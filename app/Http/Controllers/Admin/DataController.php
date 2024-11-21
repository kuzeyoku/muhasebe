<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getDistricts(Request $request): \Illuminate\Http\JsonResponse
    {
        $city = City::find($request->city_id);
        $districts = $city->districts()->pluck("name", "id");
        return response()->json($districts);
    }

    public function getLicences(Request $request): \Illuminate\Http\JsonResponse
    {
        $company = Company::find($request->company_id);
        $licences = $company->licences()->pluck("number", "id");
        return response()->json($licences);
    }
}
