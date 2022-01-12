<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class BlogClinetController extends Controller
{
    protected $modelPost;
    protected $modelUser;
    protected $modelComment;

    public function __construct(Post $post, User $user, Comment $comment)
    {
        $this->modelPost = $post;
        $this->modelUser = $user;
        $this->modelComment = $comment;
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
        $sum_comment = $this->modelComment->where('post_id',$id)->where('is_delete','=',0)->whereNull('parent_id')->count();
        return view('clinet.single_blog', [
            'blog_detail' => $blog_detail,
            'sum_comment' => $sum_comment,
            ]);
    }
}
