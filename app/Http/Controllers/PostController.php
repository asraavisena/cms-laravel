<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post) {
        return view('blog-post', ['post' => $post]);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store() {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image'=>'mimes:jpeg,png,jpg',
            'body' => 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post was created');
        return redirect()->route('post.index');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post, Request $request) {
        $post->delete();
        $request->session()->flash('post-destroy-message', 'Post was deleted');
        // Session::flash('message', 'Post was deleted');
        return back();
    }

    public function update(Post $post){
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image'=>'mimes:jpeg,png,jpg',
            'body' => 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        // It will changed the user
        // auth()->user()->posts()->save($post);
        // The auth not be used, the owner not be changed
        $post->save();

        session()->flash('post-updated-message', 'Post was updated');
        return redirect()->route('post.index');


    }
}
