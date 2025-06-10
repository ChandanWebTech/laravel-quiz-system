<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:3',
        ]);

        $admin = Admin::where('name', $request->name)->first();

        if (!$admin || $request->password !== $admin->password) {
            return back()->withErrors(['login' => 'Invalid username or password']);
        }

        Session::put('admin', $admin);
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $admin = Session::get('admin');


        if (!$admin) {
            return redirect('admin-login')->withErrors(['session' => 'Please login first']);
        }

        return view('admin', ['admin' => $admin->name]);
    }
}
