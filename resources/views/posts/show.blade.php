
@extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="my-4 text-center">Post Details</h1>
        <div class="card w-80 m-auto">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="https://oie.msu.edu/_assets/images/placeholder/placeholder-200x200.jpg" class="card-img" alt="post image">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->description}}</p>
                  <p class="card-text"><small class="text-muted">created at {{$post->created_at}}</small></p>
                  <h6 class="card-title">
                      <small class="text-muted">Created by : {{$post->author}}</small>
                    </h6>
                </div>
              </div>
            </div>
          </div>
    </div>
    @section('content')