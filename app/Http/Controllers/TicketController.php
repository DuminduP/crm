<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    private $airLines = ['UL' => 'UL', 'SQ' => 'SQ', 'QF' => 'QF', 'MH' => 'MH', 'TG' => 'TG', 'JQ' => 'JQ', 'VA' => 'VA'];
    private $statuses = ['Pending', 'Done'];
    /**
     * Display the customer registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['ticket']  = new Ticket();
        $data['customers']  = Customer::pluck('name', 'id');
        $data['airlines']  = $this->airLines;
        $data['statuses']  = $this->statuses;
        $data['selectedID'] = 1;
        return view('new_ticket', $data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreTicketRequest $request)
    {
        Ticket::create([
            'customer_id' => $request->customer_id,
            'from' => $request->from,
            'to' => $request->to,
            'airline' => $request->airline,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('status', 'Ticket information added!');;
    }

    /**
     * Display all tickets
     *
     * @return \Illuminate\View\View
     */
    public function listAll()
    {
        $data['tickets'] = Ticket::all();
        return view('list_tickets', $data);
    }

    /**
     * Display pending tickets
     *
     * @return \Illuminate\View\View
     */
    public function listPending()
    {
        $data['tickets'] = Ticket::where('status', 'pending')->get();
        return view('list_tickets', $data);
    }

    /**
     * Display the ticket edit view.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $data['ticket']  = Ticket::findOrFail($id);
        $data['customers']  = Customer::pluck('name', 'id');
        $data['airlines']  = $this->airLines;
        $data['statuses']  = $this->statuses;
        return view('new_ticket', $data);
    }

    /**
     * Update ticket
     * @param int $id
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\View\View
     */
    public function update($id, StoreTicketRequest $request)
    {
        $ticket  = Ticket::findOrFail($id);

        $ticket->update([
            'customer_id' => $request->customer_id,
            'from' => $request->from,
            'to' => $request->to,
            'airline' => $request->airline,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('status', 'Ticket updated!');;
    }
}
