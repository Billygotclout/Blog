@extends('layouts.app')
@section('content')
<div class="jumbotron tex t-center">
    <h1>Welcome To My Blog</h1>
    <p>Please login</p>
    <p><a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Login</a> 
        <a class="btn btn-success btn-lg" href="{{route('register')}}" role="button">Register</a>
    </p>
</div>

@endsection