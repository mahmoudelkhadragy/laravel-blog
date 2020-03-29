<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class PostController extends Controller
{
    // view all posts
    public function index(){

        //to get all rows from table post in database
        //make paggination
        $posts = Post::paginate(5);
        
        //comment place 1

        return view('posts.index', [
            'posts' => $posts
        ]);
    }


    //view create post
    public function create(){

        $users = User::all();

        //go to form page
        return view('posts.create', [
            'users' => $users
        ]);
    }

    //edit post
    public function edit() {

        $request = request();
        $post_id = $request->post;

        $post = Post::find($post_id);
        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'users'=> $users
        ]);

    }

    //update data
    public function update($post_id ){
        //get post id
        $request = request();
        $post = Post::find($post_id);

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
        ],[
            'title.required' => "Title can't be empty",
            'description.required'  => "Description can't be empty",
        ]);
        
        //update data in db
        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => $request->user_id
        ]);
        
        // Session::flash('alert-success', 'Blog updated');
        //redirect to index page
        return redirect()->route('posts.index')->withSuccess('The Post updated successfully');
    }


    //store new data to database
    public function store(){

        //get request data
        $request = request();

        //validate data
        $request->validate([
            'title' => 'required|unique:posts|min:3',
            'description' => 'required|min:10',
        ],[
            'title.required' => "Title can't be empty",
            'description.required'  => "Description can't be empty",
        ]);

        //store the request data in db
        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => $request->user_id
        ]);

        //redirect to the posts page
        return redirect()->route('posts.index');

    }

    //Delete post from database
    public function destroy(){

        $request = request();
        $post = Post::find($request->post);
        $post->delete();

        return redirect()->route('posts.index')->withSuccess('The Post deleted successfully');
    }

    //view post details
    public function show($post_id){

        // 1- take id from url
        // 2- query to retrieve the post by id
        // 3- send post to the view

        // $request = request();           // to make object from requst            
        // $post_id = $request->post;      // to get my parameter from url by requst object
        $post = Post::find($post_id);   // to get the post by id from Model

        // $post = Post::where('id', $post_id)->get();    //another way to get posts from Model
        // $postsecond = Post::where('id', $post_id)->first(); //another way to get posts from Model

        // dd($post, $postsecond);

        return view('posts.show', [
            'post' => $post
        ]);
    }


}





//comment in place 1
/*
$posts = [
            [
                'id' => 1,
                'title' => 'first post',
                'createdAt' => '2017-05-10'
            ],
            [
                'id' => 2,
                'title' => 'second post',
                'createdAt' => '2019-05-09'
            ],
            [
                'id' => 3,
                'title' => 'third post',
                'createdAt' => '2020-08-15'
            ],
    
        ];
        
        The dd function dumps the given variables and ends execution of the script:
        dd($posts);
*/
