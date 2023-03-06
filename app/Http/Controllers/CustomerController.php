<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerValidationRequest;
use App\Models\AccountBalance;

class CustomerController extends Controller
{

    public function index()
    {
        return view('customer.index');
    }

    public function dashboard()
    {
        $account_id = Auth::guard('customer')->user()->account_id;
        $balance = AccountBalance::where('account_id', $account_id)->first();
        return view('customer.dashboard', compact('balance'));
    }

    public function login()
    {
        return view('customer.login');
    }

    public function register()
    {
        return view('customer.register');
    }

    public function registerProcess(CustomerValidationRequest $request)
    {
        // create account
        $data = [
            'account_id' => $request->account_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        Customer::createCustomer($data);

        return redirect()->route('login')->with('message', 'Account created successfully');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('message', 'Welcome! You have successfully logged into your account. How can we assist you today?');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logout Successfully');
    }
}
