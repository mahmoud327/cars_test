<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|exists:admins|string|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'The email faild is required.',
            'email.string' => 'The email faild must be string.',
        ]);

        if (!Auth::guard('admins')->attempt($attr)) {
            return redirect()->route('admin.login.page')
                ->withErrors(['errors' => 'The password is incorrect.']);
        }
        return redirect()->route('banners.index');
    }

    public function logout()
    {

        auth()->guard('admins')->logout();
        return redirect()->route('admin.login.page');
    }
}
