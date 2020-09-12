<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Ticket;
use DateTime;
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
        $datetime_now = new DateTime();
        $already_customer = Customer::where('email', '=', $customer_data['email'])->first();
        if ($already_customer == null)
        { //if the customer is new
            $customer = new Customer();
            $customer->name = $customer_data['name'];
            $customer->email = $customer_data['email'];
            $customer->save();

            $ticket = new Ticket();
            $ticket->customer_id = $customer->id;
            $ticket->subject = $ticket_data['subject'];
            $ticket->description = $ticket_data['description'];
            $ticket->submission_date = $datetime_now->format('Y-m-d H:i:s');
            $ticket->due_date = "2020-00-00 00:00:00";
            $ticket->save();
            return view("success", compact('ticket','customer' ));
        }
        else if($already_customer->name == $customer_data['name'])
        { //customer exists and uses the correct name and email
            $customer = $already_customer;

            $ticket = new Ticket();
            $ticket->customer_id = $already_customer->id;
            $ticket->subject = $ticket_data['subject'];
            $ticket->description = $ticket_data['description'];
            $ticket->submission_date = $datetime_now->format('Y-m-d H:i:s');
            $ticket->due_date = "2020-00-00 00:00:00";
            $ticket->save();
            return view("success", compact('ticket','customer' ));
        }
        else
        { //if the the customer uses others email
            abort("403");
        }

    }
    public function due_date_calculator($date){
        //date -> due_date
    }

}
