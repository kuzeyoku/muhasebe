<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Invoice;
use App\Models\Licence;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $licences = Licence::all();
        $invoices = Invoice::all();
        $incomes = Income::all();
        $expenses = Expense::all();
        return view("index", compact("companies", "licences", "invoices", "incomes", "expenses"));
    }

    public function cacheClear()
    {
        cache()->flush();
        return redirect()->route("dashboard")->with("success", __("cache.cleared"));
    }
}
