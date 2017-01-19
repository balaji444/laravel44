@extends('layouts.app')
<head>
<link rel="stylesheet" type="text/css" href="public/css/app.css">
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact View</div>
                <div class="panel-body">                    
<table border="1">
    
                    
                    <tr><td>Name</td><td>{{ $contacts->name }}</td></tr>
                    <tr><td>Email</td><td>{{ $contacts->email }}</td></tr>
                    <tr><td>Subject</td><td>{{ $contacts->subject }}</td></tr>
                    <tr><td>Message</td><td>{{ $contacts->message }}</td></tr>                    
                    </tr>
                    
                    
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
