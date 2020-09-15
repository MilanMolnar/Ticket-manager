<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(){//returns the admin view with the peginated tickets and all the customers
        $tickets = Ticket::latest()->paginate(10);
        $customers = Customer::all();

        return view("auth.admin", compact('tickets','customers'));
    }
}
