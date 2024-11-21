<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
})->name("home");

Route::prefix("admin")->name("admin.")->group(callback: function () {
    Route::controller(\App\Http\Controllers\Admin\AuthController::class)->name("auth.")->group(function () {
        Route::get("login", "showLoginForm")->name("login");
        Route::post("login", "login")->name("login");
        Route::get("forgot-password", "showForgotPasswordForm")->name("forgot-password");
        Route::post("forgot-password", "sendResetLinkEmail")->name("send-reset-link-email");
        Route::get("reset-password/{token}", "showResetPasswordForm")->name("reset-password");
        Route::post("reset-password", "resetPassword")->name("reset-password");
    });

    Route::middleware(Admin::class)->group(function () {
        Route::get("logout", [\App\Http\Controllers\Admin\AuthController::class, "logout"])->name("logout");
        Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function () {
            Route::get("/", "index")->name("dashboard");
            Route::get("cache-clear", "cacheClear")->name("cache-clear");
        });

        Route::resource("company", \App\Http\Controllers\Admin\CompanyController::class);
        Route::resource("licence", \App\Http\Controllers\Admin\LicenceController::class);
        Route::resource("contract", \App\Http\Controllers\Admin\ContractController::class);
        Route::resource("invoice", \App\Http\Controllers\Admin\InvoiceController::class);
        Route::resource("income", \App\Http\Controllers\Admin\IncomeController::class);
        Route::resource("expense", \App\Http\Controllers\Admin\ExpenseController::class);

        //DataRoutes
        Route::post("getDistricts", [\App\Http\Controllers\Admin\DataController::class, "getDistricts"])->name("getDistricts");
        Route::post("getLicences", [\App\Http\Controllers\Admin\DataController::class, "getLicences"])->name("getLicences");
    });


});
