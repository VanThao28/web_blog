<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;
    protected $fillable =[
        'comment_post',
        'commentable_type',
        'commentable_id',
        'post_id',
        'users_id',
        'parent_id',
        'is_delete',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->where('is_delete','=',0);
    }
}
