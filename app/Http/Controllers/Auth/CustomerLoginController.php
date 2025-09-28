<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected $redirectTo = '/customer/dashboard';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    protected function guard()
    {
        return auth()->guard('customer');
    }

    public function showLoginForm()
    {
        return view('auth.customer-login');
    }
    public function logout(Request $request)
{
    $this->guard()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}
}
