<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function show(){
        $tickets = Ticket::latest()->paginate(10);

        return view("auth.admin", compact('tickets'));
    }
}
