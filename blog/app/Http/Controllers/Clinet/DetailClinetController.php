<?php

namespace App\Http\Controllers\clinet;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\User;

class DetailClinetController extends Controller
{
    protected $modelPost;
    protected $modelUser;

    public function __construct(Post $post, User $user)
    {
        $this->modelPost = $post;
        $this->modelUser = $user;
    }
    public function detail($id) {
        $posts =$this->modelPost->find($id);
        $name_post = $posts->user()->first();
       return view('clinet.details', [
           'post' => $posts,
           'name_post' => $name_post,
       ]);
    }
}
