<?php

use App\Http\Controllers\PostController;
use App\Models\image;
use App\Models\Post;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);
// Route::get('/post/soft-delete/{id}', [PostController::class, 'softDelete'])->name('post.softDelete');
// Route::get('/get/post', [PostController::class, 'getPosts'])->name('get.posts');


// Route::get('/test', function () {
//     $user = User::first();
//     return $user->post;
// });

Route::get('/test', function () {
    // $user = User::first();
    // if ($user->post) {
    //     return $user->post->username;
    // } else {
    //     return 'No Post Found';
    // }


    // $user = User::first();
    // return $user->comments;

    $user = User::first();
    $post = Post::first();
    $role = role::first();
    $image = image::first();
    // return $user->roles()->attach($post);

    // return $user->roles;

    // $user->roles()->detach($post);

    // $role->users()->attach($user);

    // $user->roles()->attach([1, 2]);

    // $user->roles()->detach([1, 2]);

    // $user->roles()->sync($role->id);
    // $user->roles()->sync([2]);
    // return $post->image;
    // return $image->imageable;
    // $image = image::find(2);
    // return $image->imageable;

    // return $user->image;

    return $post->tags;
});
