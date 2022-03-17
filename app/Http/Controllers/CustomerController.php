<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreCustomerRequest;

class CustomerController extends Controller
{
    private $statuses = ['Pending', 'Done'];

    /**
     * Display the customer registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['customer']  = new Customer();
        $data['statuses']  = $this->statuses;
        return view('new_customer', $data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreCustomerRequest $request)
    {
        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'passport_number' => $request->passport_number,
            'passport_expiry' => $request->passport_expiry,
            'dob' => $request->dob,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('status', 'New Customer Created!');;
    }

    /**
     * Display pending customers
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $data['customers'] = Customer::where('status', 'pending')->get();
        return view('dashboard', $data);
    }

    /**
     * Display all customers
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $data['customers'] = Customer::all();
        return view('all_customers', $data);
    }

    /**
     * Display the customer edit view.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $data['customer']  = Customer::findOrFail($id);
        $data['statuses']  = $this->statuses;
        return view('new_customer', $data);
    }

    /**
     * Display the customer detail view.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function view(int $id)
    {
        $data['customer']  = Customer::findOrFail($id);
        return view('view_customer', $data);
    }

    /**
     * Update customer
     * @param int $id
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\View\View
     */
    public function update($id, StoreCustomerRequest $request)
    {
        $customer  = Customer::findOrFail($id);

        $user = $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'passport_number' => $request->passport_number,
            'passport_expiry' => $request->passport_expiry,
            'dob' => $request->dob,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('status', 'Customer updated!');;
    }

    /**
     * Delete customer
     * @param int $id
     */
    public function delete($id)
    {
        $customer  = Customer::findOrFail($id)->delete();

        return redirect()->route('dashboard')->with('status', 'Customer Deleted!');;
    }
}
