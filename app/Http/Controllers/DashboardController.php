<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Debit;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Invoice;
use App\Models\Licence;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "companies" => Company::all(),
            "licences" => Licence::all(),
            "invoices" => Invoice::all(),
            "incomes" => Income::all(),
            "expenses" => Expense::all(),
            "debits" => Debit::all(),
        ];
        return view("index", $data);
    }

    public function cacheClear()
    {
        cache()->flush();
        return redirect()->route("dashboard")->with("success", __("cache.cleared"));
    }
}
