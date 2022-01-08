<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_post',
        'name_image_post',
        'topic',
        'user_id',
        'contents',
        'is_public',
        'is_delete',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('is_delete','=',0)->whereNull('parent_id');
    }
}
