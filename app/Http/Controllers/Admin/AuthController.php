<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route("admin.dashboard");
        }
        return view("admin.auth.login");
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only("email", "password");

        if (auth()->attempt($credentials)) {
            return redirect()->route("admin.dashboard");
        }

        return back()->with("error", __("admin/auth.failed"));
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();
        return redirect()->route("admin.auth.login")->with("success", __("admin/auth.logout"));
    }
}
