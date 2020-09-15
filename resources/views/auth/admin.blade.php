@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card row-cols-md-1 my-4" style="position: fixed;">
        <div class="card-header justify-content-center ">
            <h5 class="font-weight-bold m-0 p-0">Order by</h5>
        </div>
        <button id="submit_sort" value="submission_date" class="btn btn-outline-dark p-1 m-1 my-2">
            Submitted date
        </button>
        <button id="due_sort" value="due_date" class="btn btn-outline-dark p-1 m-1 mb-2">
            Due date
        </button>
        <p class="m-0 px-2">Customers:</p>
        <hr>
        <ul style="overflow: scroll;overflow-x: hidden;list-style-type: none; max-height: 300px;  width: 170px; padding-left: 10px" >
        @foreach($customers as $customer)
            <li style="margin-left: 0px; padding-left: 0px">
                <button class="customer" style="background-color: white; border: none" value="{{$customer->id}}">
                    {{$customer->name}}
                </button>
                <hr style="padding: 0; margin: 5px">
            </li>
        @endforeach
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8" id="ticket_container">
            @foreach($tickets as $ticket)
                <div class="card my-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold">Username: {{$ticket->customer->name}}</h5>
                    </div>
                    <div class="card-body">
                        <p><b>Subject:</b> {{$ticket->subject}}</p>
                        <hr>
                        <p style="white-space: pre-line"><b> Description:</b> {{$ticket->description}}</p>
                        <hr>
                        <div>
                            <p style="padding: 0; margin: 0"><b> Submitted at:</b> {{$ticket->submission_date}}</p><br>
                            <p style="padding: 0; margin: 0"><b>Due date at:</b> {{$ticket->due_date}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3 d-flex justify-content-center pt-5">
            {{$tickets->links()}}
        </div>
    </div>
</div>
@endsection
