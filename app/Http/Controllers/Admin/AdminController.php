<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return view("back.anasayfa");
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route("admin.dashboard");
        }

        return view("back.login");
    }
    public function loginCheck(Request $request)
    {

        if (Auth::attempt($request->only("email", "password"))) {
            $request->session()->regenerate();
            return redirect()->route("admin.dashboard");

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view("back.login");
    }

}
