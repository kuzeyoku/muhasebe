<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getDistricts(Request $request): JsonResponse
    {
        $city = City::find($request->city_id);
        $districts = $city->districts()->pluck("name", "id");
        return response()->json($districts);
    }

    public function getLicences(Request $request): JsonResponse
    {
        $company = Company::find($request->company_id);
        $licences = $company->licences()->pluck("number", "id");
        return response()->json($licences);
    }
}
