<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();

        // $posts = [
        //     [
        //         'id' => 1,
        //         'title' => 'first post',
        //         'createdAt' => '2017-05-10'
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'second post',
        //         'createdAt' => '2019-05-09'
        //     ],
        //     [
        //         'id' => 3,
        //         'title' => 'third post',
        //         'createdAt' => '2020-08-15'
        //     ],
    
        // ];
    
        //The dd function dumps the given variables and ends execution of the script:
        //dd($myPosts);

        dd($posts);
    
        return view('index', [
            'posts' => $posts
        ]);
    }
}
