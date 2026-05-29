<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\SigninRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(SigninRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return back()->with('error', 'Credenciales incorrectas')->withInput();
        }

        return redirect()->route('dashboard');
    }
}
