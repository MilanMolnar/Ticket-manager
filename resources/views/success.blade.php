@extends('layouts.app')

@section('content')

    <div class="alert alert-success col-6 offset-3" role="alert">
        <h2 class="alert-heading">Ticket successfully submitted!</h2>
        <h4>Your ticket will be handled by *{{"insert due date here"}}* !</h4>
        <hr>
        Owner:
        <p class=" card p-2"> {{$customer->name}}</p>
        <hr>
        subject:
        <p class=" card p-2"> {{$ticket->subject}}</p>
        <hr>
        description:
        <p class=" card p-2" style="white-space: pre-line"> {{$ticket->description}}</p>
    </div>
    <a class="btn btn-outline-primary offset-5 col-2" href="/home">
        Back
    </a>




@endsection
