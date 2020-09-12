@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($tickets as $ticket)
                <div class="card my-4">
                    <div class="card-header">
                        <b>{{$ticket->customer->name}}</b>
                    </div>
                    <div class="card-body">
                        <p>{{$ticket->subject}}</p>
                        <hr>
                        <p style="white-space: pre-line">{{$ticket->description}}</p>
                        <hr>
                        <div>
                            <div class="col-6">
                                submitted at: {{"2020/00/00, 00:00"}}
                            </div>
                            <div class="col-6">
                                due date at: {{"2020/00/00, 00:00"}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
            {{$tickets->links()}}
        </div>
    </div>
</div>
@endsection
