<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SortingController extends Controller
{
    //Sort by submission date Descending
    public function submit(Request $request){
        $sortPattern = $request['sort'];

        $tickets = DB::table('tickets')
            ->join("customers", "tickets.customer_id", "=", "customers.id" )
            ->select("tickets.*", "customers.name")
            ->orderBy($sortPattern, 'DESC')->get();

        return response()->json($tickets);
    }

    //Sort by due date ascending
    public function due(Request $request){
        $sortPattern = $request['sort'];

        $tickets = DB::table('tickets')
            ->join("customers", "tickets.customer_id", "=", "customers.id" )
            ->select("tickets.*", "customers.name")
            ->orderBy($sortPattern, 'ASC')->get();

        return response()->json($tickets);
    }

    //sort to a specific user
    public function customer_filter(Request $request){
        $customer_id = $request['customer'];

        $tickets = DB::table('tickets')
            ->join("customers", "tickets.customer_id", "=", "customers.id" )
            ->where("tickets.customer_id", "=", $customer_id)
            ->select("tickets.*", "customers.name")
            ->orderBy("due_date", 'DESC')->get();

        return response()->json($tickets);
    }

}
