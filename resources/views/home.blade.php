@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('create') }}" class="btn btn-primary  ">Create Post</a>

                        <h3>Your Blog Posts</h3>

                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td></td>
                                <td></td>

                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a> </td>
                                    <td><a class="btn btn-primary" href="/posts/{{ $post->id }}/edit">Edit</a></td>
                                    <td>
                                        <form action="{{ route('delete', $post->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                            @method('DELETE')
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </table>

                        {{-- @if (count($posts) > 0) --}}

                        {{-- @else
                  <h3>No Posts Available</h3>
              @endif --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
