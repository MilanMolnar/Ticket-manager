<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Interfaces\IDueDateCalculator;
use App\Ticket;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    //stores the ticket after form complition
    public function store(IDueDateCalculator $dueDateCalculator){
        $customer_data = request()->validate([//validation for customer and ticket data
            'email' => 'required',
            'name'=> 'required',
        ]);

        $ticket_data = request()->validate([
            'subject' => 'required',
            'description'=> 'required',
        ]);

        $datetime_now = new DateTime('Europe/Budapest');//setting the timezone
        //getting the customer if exists
        $already_customer = Customer::where('email', '=', $customer_data['email'])->first();

        if ($already_customer == null)
        { //if the customer is new
            //saving the customer
            $customer = new Customer();
            $customer->name = $customer_data['name'];
            $customer->email = $customer_data['email'];
            $customer->save();
            //saving the ticket
            $ticket = new Ticket();
            $ticket->customer_id = $customer->id;
            $ticket->subject = $ticket_data['subject'];
            $ticket->description = $ticket_data['description'];
            $ticket->submission_date = $datetime_now->format('Y-m-d H:i');
            $ticket->due_date = $dueDateCalculator->due_date_calculator($ticket->submission_date);
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
            $ticket->submission_date = $datetime_now->format('Y-m-d H:i');
            $ticket->due_date = $dueDateCalculator->due_date_calculator($ticket->submission_date);
            $ticket->save();
            return view("success", compact('ticket','customer' ));
        }
        else
        { //if the the customer uses others email
            return redirect()->back()->with("message", "Someone else alrady uses that e-mail!");
        }
    }
}
