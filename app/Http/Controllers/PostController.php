<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\createRequest;
use App\Http\Requests\Post\updateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withTrashed()->simplePaginate(10);
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequest $request)
    {
        // $image = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('uploads'), $image);
        Post::create([
            // 'imageName' => $image,
            'user_id' => 1,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'dateofbirth' => $request->dateofbirth
        ]);
        $request->session()->flash('alert-success', 'Post Saved Successfully');
        return to_route('post.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        if (!$posts) {
            abort(404);
        }
        return view('post.edit', ['post' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }

        // $image = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('uploads'), $image);
        $post->update([
            // 'imageName' => $image,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $request->session()->flash('alert-success', 'Post Saved Successfully');
        return to_route('post.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->delete();
        request()->session()->flash('alert-success', 'User Deleted Successfully');
        return to_route('post.index');
    }

    public function softDelete($id)
    {
        $posts = Post::onlyTrashed()->find($id);
        if (!$posts) {
            abort(404);
        }
        $posts->update([
            'deleted_at' => null,
        ]);
        request()->session()->flash('Deletion-recovered', 'successfully recovered');
        return to_route('post.index');
    }
    public function getPosts()
    {
        // return DB::table('posts')->pluck('username');

        return DB::select('insert into posts (username,email,phone,password,dateofbirth) values (?,?, ?, ?,?)', ['Hello', 'world', '123', '123', '2003-12-13']);
    }
}
