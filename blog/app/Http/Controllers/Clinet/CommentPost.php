<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class CommentPost extends Controller
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
    public function CommentStore(Request $request){
        $request->validate([
            'comment' => 'required',
        ]);
        $input = $request->only([
            'post_id',
            'user_id',
            'comment',
        ]);
        $data = [
            'post_id' =>(int) $input['post_id'],
            'user_id' =>(int) $input['user_id'],
            'comment' => $input['comment'],
        ];
        $comment = new Comment();
        $comment->user()->associate($data['user_id']);
        $comment->comment_post = $data['comment'];
        $posts = $this->modelPost->find($data['post_id']);
        $posts->comments()->save($comment);
        return back();
    }
    public function CommentId(Request $request){
        $commentId = (int) $request->commentid;
        $comments = $this->modelComment->findOrFail($commentId);
        return response()->json(['data'=>$comments]);
    }
    public function CommentCreate(Request $request) {
        $request->validate([
            'comment_post' => 'required',
        ]);
        $input = $request->only([
            'post_id',
            'user_id',
            'comment_id',
            'comment_post',
        ]);
        $data = [
            'post_id' =>(int) $input['post_id'],
            'user_id' =>(int) $input['user_id'],
            'comment_id' =>(int) $input['comment_id'],
            'comment_post' => $input['comment_post'],
        ];
        $commentId = (int) $request->comment_id;
        $comment = new Comment();
        $comment->parent_id = $commentId;
        $comment->user()->associate($data['user_id']);
        $comment->comment_post =$data['comment_post'];
        $posts = $this->modelPost->find($data['post_id']);
        $posts->comments()->save($comment);
        return response()->json('create comment');
    }
    public function DelComment(Request $request){
        $commentId = (int) $request->delcommentid;
        $comment = $this->modelComment->find($commentId);
        $delete_data = [
            'is_delete'=>1,
            'parent_id' => $commentId,
        ];
        $comment->update($delete_data);
        return response()->json(['data' => $comment]);
    }
}
