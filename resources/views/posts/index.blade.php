
@extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="text-center my-3">Blog</h1>

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
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a class="btn btn-primary btn-sm" href=" {{ route('posts.show', ['post'=>$post->id]) }}" role="button">View Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
    




