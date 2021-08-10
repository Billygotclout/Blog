@extends('layouts.app')
@section('content')
<div class="mt-4">
    <form action="{{route('update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label  class="form-label">Title</label>
          <input type="text" class="form-control"  aria-describedby="emailHelp" name="title" value="{{$post->title}}">
          <span class="text-danger">@error('title')* {{$message}} @enderror</span>
        </div>
        <div class="form-floating">
            <textarea class="form-control " placeholder="Enter Content Below" id="floatingTextarea2" style="height: 400px" name="content" >{{$post->content}}</textarea>
            <span class="text-danger">@error('content')* {{$message}} @enderror</span>
          </div>
          <div class="mb-3">
           
            <input class="form-control" type="file" id="formFile">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>


@endsection