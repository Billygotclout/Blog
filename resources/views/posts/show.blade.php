@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <div class="container">
        <img style="width:50%" src="/storage/images/{{$post->image}}" alt="Image" srcset="">
    </div>
    <h3>{{$post->content}}</h3>
    @if (Auth::user()->id ==$post->user_id)
    <a href="{{route('edit', $post->id)}}" class="btn btn-success">Edit</a>
    <form action="{{route('delete', $post->id)}}"  method="POST">
        @csrf
    <button type="submit" class="btn btn-danger">
        Delete
    </button>
   @method('DELETE')
    </form>
    @endif
   
  
@endsection
