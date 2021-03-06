@extends('layouts.app')
@section('content')
<h1>Posts Page</h1>
@if (count($posts)>0)
@foreach ($posts as $post)
<div class="card card-body bg-light mb-3">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <img style="width: 50%" src="/storage/images/{{$post->image}}" alt="" srcset="">
        </div>
        <div class="col-md-8 col-sm-8">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a> </h3>
            <small>Written on {{$post->created_at}}</small>
        </div>
    </div>
    
</div>  
@endforeach
@else
    <h3>No posts Available</h3>
@endif

@endsection