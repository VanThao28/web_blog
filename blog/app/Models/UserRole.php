<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'role_id',
        'is_delete',
    ];
    public function users(){
        $this->belongsTo(User::class);
    }
    public function roles(){
        $this->belongsTo(Role::class);
    }
}
