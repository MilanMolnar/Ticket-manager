<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Ticket;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(){
        $customer_data = request()->validate([
            'email' => 'required',
            'name'=> 'required',
        ]);

        $ticket_data = request()->validate([
            'subject' => 'required',
            'description'=> 'required',
        ]);

        $customer = Customer::where('email', '=', $customer_data['email'])->first();
        if ($customer == null)
        { //if the customer is new
            $new_customer = new Customer();
            $new_customer->name = $customer_data['name'];
            $new_customer->email = $customer_data['email'];
            $new_customer->save();

            $ticket = new Ticket();
            $ticket->customer_id = $new_customer->id;
            $ticket->subject = $ticket_data['subject'];
            $ticket->description = $ticket_data['description'];
            $ticket->save();
        }
        else if($customer->name == $customer_data['name'])
        { //customer exists and uses the correct name and email
            $ticket = new Ticket();
            $ticket->customer_id = $customer->id;
            $ticket->subject = $ticket_data['subject'];
            $ticket->description = $ticket_data['description'];
            $ticket->save();
        }
        else
        { //if the the customer uses others email
            abort("403");
        }


    }

}
