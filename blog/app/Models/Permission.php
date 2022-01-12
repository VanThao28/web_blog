<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable =[
       'code',
        'full_name',
        'is_delete',
    ];
     public function roles(){
         return $this->belongsToMany(Role::class,'permission_roles');
     }
     public function users() {
         return $this->belongsToMany(User::class,'user_roles');
     }
}
