<?php

namespace App\Http\Controllers\clinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\Post;

class IndexClinetController extends Controller
{
    protected $modelUser;
    protected $modelPost;

    public function __construct(User $user ,Post $post)
    {
        $this->modeUser = $user;
        $this->modelPost = $post;
    }
    public function index()
    {
        $posts = $this->modelPost
                ->orderby('id','desc')
                ->where('is_public',1)
                ->get();
        $top_trending= $this->modelPost
            ->orderby('id','desc')
            ->where('is_public',1)
            ->first();
        $right_trending = $this->modelPost
            ->inRandomOrder('id')
            ->where('is_public',1)
            ->limit(4)
            ->get();
        $button_trending= $this->modelPost
            ->where('is_public',1)
            ->limit(3)
            ->get();
        $tab_content = $this->modelPost
            ->inRandomOrder('id')
            ->where('is_public', 1)
            ->limit(4)
            ->get();
        $section_tile = $this->modelPost
            ->where('is_public','1')
            ->limit(5)
            ->get();
        return view('clinet.index',[
            'posts' => $posts,
            'top_trending' =>$top_trending,
            'right' => $right_trending,
            'button_trendy' => $button_trending,
            'tab_trending' => $tab_content,
            'section_tile' => $section_tile,
        ]);
    }
}
