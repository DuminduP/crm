<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class CustomerController extends Controller
{
    /**
     * Display the customer registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('new_customer');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'string', 'max:25', 'min:8'],
            'passport_number' => ['required'],
        ]);

        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'passport_number' => $request->passport_number,
            'passport_expiry' => $request->passport_expiry,
            'dob' => $request->dob,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
