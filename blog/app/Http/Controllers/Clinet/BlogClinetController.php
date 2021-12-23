<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class BlogClinetController extends Controller
{
    protected $modelPost;
    protected $modelUser;

    public function __construct(Post $post, User $user)
    {
        $this->modelPost = $post;
        $this->modelUser = $user;
    }
    public function blog() {
        $blog = $this->modelPost::with('user:id,name')
            ->where('is_public','1')
            ->paginate(config('paginate.blog'));
        return view('clinet.blog', [
            'blog' =>$blog,
            ]);
    }
    public function blogDetail($id) {
        $blog_detail = $this->modelPost::with('user:id,name')->findOrFail($id);

        return view('clinet.single_blog', [
            'blog_detail' => $blog_detail,
            ]);
    }
}
