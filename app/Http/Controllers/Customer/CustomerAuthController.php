<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function showLoginForm(){
        return view('customer.auth.customer_login');
    }

    public function login(Request $request){
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('customer_panel.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials, please try again.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm(){
        return view('customer.auth.customer_register');
    }

    public function logout(){
        request()->session()->flush();
        return redirect('/')->with('danger','Succfully Logged Out');
    }

   public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'district' => 'required|string|max:100',
        'post_code' => 'required|string|max:20',
    ]);

    // Create new customer
    $customer = Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
        'city' => $request->city,
        'district' => $request->district,
        'post_code' => $request->post_code,
    ]);

    // Log in the new customer
    Auth::guard('customer')->login($customer);

    return redirect()->route('customer_panel.dashboard');
}
    
}
