<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function cacheClear()
    {
        cache()->flush();
        return redirect()->route("admin.dashboard")->with("success", __("cache.cleared"));
    }
}
