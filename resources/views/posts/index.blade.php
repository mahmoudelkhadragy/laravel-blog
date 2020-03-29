
@extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="text-center my-3">Blog</h1>

        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a class="btn btn-secondary mb-2" href="{{ route('posts.create')}}" role="button">Create Post</a>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user ? $post->user->name : 'No Author'}}</td>
                    <td>{{$post->created_at->format('d-m-Y')}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href=" {{ route('posts.show', ['post'=>$post->id]) }}" role="button">View Details</a>
                        <a class="btn btn-success btn-sm" href=" {{ route('posts.edit', ['post'=>$post->id]) }}" role="button">Edit</a>

                        <form class="d-inline" action="{{ route('posts.destroy', ['post'=>$post->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }} <!-- to display pagination link -->
    </div>
    @endsection
    




