<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'image_users',
        'image_name',
        'password',
        'is_delete',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function givePermissiongTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    public function withdrawPermissionTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }
    public function refreshPermissions(... $permissions){
        $this->permission()->detach();
        return $this->givePermissiongTo($permissions);
    }
    public function hasPremissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission);
    }
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if($this->roles->contains('code', $role)) {
                return true;
            }
        }
        return false;
    }
    public function roles() {
        return $this->belongsToMany(Role::class,'user_roles');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class,'user_permission');
    }
    public function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('code',$permissions)->get();
    }
}
