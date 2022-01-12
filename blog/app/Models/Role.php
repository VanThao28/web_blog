<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable =[
        'code',
        'full_name',
        'is_delete',
    ];

    public function users(){
        return $this->belongsToMany(User::class,'user_roles');
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_roles');
    }
    public function permission_role() {
        return $this->belongsTo($this->permission_role());
    }
    public function permissionRoles() {
        return $this->belongsTo(PermissionRole::class);
    }
}
