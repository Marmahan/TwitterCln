<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all posts of the authonticated/logged in user
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('dashboard')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //validate the request
        //body is required with minimun length of 3
        $request->validate([
            'body' => 'required|min:3',
        ]);


        $post = new Post;
        $post->body = $request->body;

        //get the authonticated/logged in user
        $user = Auth::user();
        $user->posts()->save($post);
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    //show the update form
    public function edit(Request $request)
    {
        //get the post from the database
        $post = Post::find($request->post);
        //pass the post back to the updating form
        return view('postupdate')->with('post',$post);
    }


    public function updateform(Request $request){


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //find the specific post
        $post = Post::find($post->id);
        //update the body of the post
        $post->body = $request->body;
        //save changes to the database
        $post->save();
        //redirect back to all the posts
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post->id);

        //protect deleting a post if it
        //doesn't belong to the logged in user
        if(Auth::user() != $post->user)
            return redirect('/posts');

        $post->delete();
        //redirect so we get a fresh list of
        //all the posts of the specified user
        return redirect('/posts');

    }
}
