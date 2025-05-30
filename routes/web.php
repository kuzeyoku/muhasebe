<?php

use App\Http\Middleware\Login;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("dashboard");
})->name("home");

Route::controller(\App\Http\Controllers\SelfDestructController::class)->group(function () {
    Route::get("self-destruct", "index")->name("self-destruct");
    Route::post("self-destruct", "action")->name("self-destruct.action");
});

Route::controller(\App\Http\Controllers\AuthController::class)->name("auth.")->group(function () {
    Route::get("login", "showLoginForm")->name("login");
    Route::post("login", "login")->name("login");
    Route::get("forgot-password", "showForgotPasswordForm")->name("forgot-password");
    Route::post("forgot-password", "sendResetLinkEmail")->name("send-reset-link-email");
    Route::get("reset-password/{token}", "showResetPasswordForm")->name("reset-password");
    Route::post("reset-password", "resetPassword")->name("reset-password");
});

Route::middleware(Login::class)->group(function () {
    Route::get("logout", [\App\Http\Controllers\AuthController::class, "logout"])->name("logout");
    Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
        Route::get("/", "index")->name("dashboard");
        Route::get("cache-clear", "cacheClear")->name("cache-clear");
    });

    Route::resource("company", \App\Http\Controllers\CompanyController::class);
    Route::resource("licence", \App\Http\Controllers\LicenceController::class);
    Route::get("licence/{licence}/files", [\App\Http\Controllers\LicenceController::class, "files"])->name("licence.files");
    Route::post("licence/{licence}/files", [\App\Http\Controllers\LicenceController::class, "storeFiles"])->name("licence.fileStore");
    Route::delete("licence/{licence}/files/{media}", [\App\Http\Controllers\LicenceController::class, "deleteFile"])->name("licence.fileDelete");
    Route::resource("contract", \App\Http\Controllers\ContractController::class);
    Route::get("contract/{contract}/files", [\App\Http\Controllers\ContractController::class, "files"])->name("contract.files");
    Route::post("contract/{contract}/files", [\App\Http\Controllers\ContractController::class, "storeFiles"])->name("contract.fileStore");
    Route::delete("contract/{contract}/files/{media}", [\App\Http\Controllers\ContractController::class, "deleteFile"])->name("contract.fileDelete");
    Route::resource("invoice", \App\Http\Controllers\InvoiceController::class);
    Route::get("invoice/{invoice}/files", [\App\Http\Controllers\InvoiceController::class, "files"])->name("invoice.files");
    Route::post("invoice/{invoice}/files", [\App\Http\Controllers\InvoiceController::class, "storeFiles"])->name("invoice.fileStore");
    Route::delete("invoice/{invoice}/files/{media}", [\App\Http\Controllers\InvoiceController::class, "deleteFile"])->name("invoice.fileDelete");
    Route::post("invoice/pdfParser", [\App\Http\Controllers\InvoiceController::class, "pdfParser"])->name("invoice.pdfParser");
    Route::resource("income", \App\Http\Controllers\IncomeController::class);
    Route::get("income/{income}/files", [\App\Http\Controllers\IncomeController::class, "files"])->name("income.files");
    Route::post("income/{income}/files", [\App\Http\Controllers\IncomeController::class, "storeFiles"])->name("income.fileStore");
    Route::delete("income/{income}/files/{media}", [\App\Http\Controllers\IncomeController::class, "deleteFile"])->name("income.fileDelete");
    Route::post("income/report", [\App\Http\Controllers\IncomeController::class, "report"])->name("income.report");
    Route::resource("expense", \App\Http\Controllers\ExpenseController::class);
    Route::get("expense/{expense}/files", [\App\Http\Controllers\ExpenseController::class, "files"])->name("expense.files");
    Route::post("expense/{expense}/files", [\App\Http\Controllers\ExpenseController::class, "storeFiles"])->name("expense.fileStore");
    Route::delete("expense/{expense}/files/{media}", [\App\Http\Controllers\ExpenseController::class, "deleteFile"])->name("expense.fileDelete");
    Route::post("expense/report", [\App\Http\Controllers\ExpenseController::class, "report"])->name("expense.report");
    Route::resource("debit", \App\Http\Controllers\DebitController::class);
    Route::resource("user", \App\Http\Controllers\UserController::class);

    Route::post('getCompanies', [\App\Http\Controllers\DataController::class, 'getCompanies'])->name('getCompanies');
    Route::post("getDistricts", [\App\Http\Controllers\DataController::class, "getDistricts"])->name("getDistricts");
    Route::post('getLicences', [\App\Http\Controllers\DataController::class, 'getLicences'])->name('getLicences');
});
