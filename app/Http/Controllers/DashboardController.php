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
            "companies_count" => Company::count(),
            "licences_count" => Licence::count(),
            "invoices_count" => Invoice::count(),
            "invoices_sum" => Invoice::sum("amount"),
            "incomes" => Income::all(),
            "incomes_sum" => Income::sum("amount"),
            "expenses" => Expense::all(),
            "expenses_sum" => Expense::sum("amount"),
            "upcoming_debits" => Debit::betweenDueDate(7)->get(),
            "overdue_debits" => Debit::overdue()->get(),
            "upcoming_payable_invoices" => Invoice::unpaid()->expense()->betweenDueDate(7)->get(),
            "upcoming_receivable_invoices" => Invoice::unpaid()->income()->betweenDueDate(7)->get(),
            "overdue_payable_invoices" => Invoice::unpaid()->expense()->overdue()->get(),
            "overdue_receivable_invoices" => Invoice::unpaid()->income()->overdue()->get(),
        ];
        return view("index", $data);
    }

    public function cacheClear()
    {
        cache()->flush();
        return redirect()->route("dashboard")->with("success", __("cache.cleared"));
    }
}
