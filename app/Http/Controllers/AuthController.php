<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route("dashboard");
        }
        return view("auth.login");
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only("email", "password");

        if (auth()->attempt($credentials)) {
            return redirect()->route("dashboard")->with("success", "Hoşgeldiniz " . auth()->user()->name);
        }
        return back()->with("error", "Eksik yada hatalı bilgi girdiniz . ");
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route("auth.login")->with("success", "Başarıyla çıkış yaptınız.");
    }
}
