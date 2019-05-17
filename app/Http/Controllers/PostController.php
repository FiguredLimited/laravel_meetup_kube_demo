<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    use ValidatesRequests;

    public function listPosts()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->get();

        return view('index', [
            'posts' => $posts
        ]);
    }

    public function addPost(Request $request)
    {
//        dd($request);

//        $this->validate($request, [
//            'content'                  => 'required',
//        ]);
//
        $post = new Post();

        $post->content = strip_tags($request->get('content'));

        $post->save();

        return redirect(route('index'));
    }

}

