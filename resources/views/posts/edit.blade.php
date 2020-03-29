@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="w-60 mx-auto mt-2" method="POST"  action="{{route('posts.update', ['post'=>$post->id])}}">
            @method('PUT')
            @csrf
            <div class="form-group">
            <label for="title">Post Title</label>
            
            <input type="text" class="form-control" name="title" id="title" placeholder="title here..." value="{{$post->title}}">
            </div>

            <div class="form-group">
            <label for="description">Post Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{$post->description}}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Author</label>
                    <select id="inputState" class="form-control" name="user_id">

                        @foreach ($users as $user)
                            @if($post->user_id == $user->id)
                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                            @else
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif

                        @endforeach 

                    </select>
                </div>
            </div>

            <input class="btn btn-primary float-right" type="submit" value="Update">
        </form>
    </div>
@endsection