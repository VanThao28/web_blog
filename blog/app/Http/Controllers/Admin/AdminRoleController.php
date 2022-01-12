<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Models\PermissionRole;
use App\Models\UserRole;
use Illuminate\Support\Facades\Gate;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelUser;
    private $modelRole;
    private $modelPermission;
    private $modelPermissionRole;
    private $modelUserRole;

    public function __construct(User $user, Role $role, Permission $permission, PermissionRole $permissionrole, UserRole $userRole)
    {
        $this->modelRole = $role;
        $this->modelPermission = $permission;
        $this->modelUser = $user;
        $this->modelPermissionRole = $permissionrole;
        $this->modelUserRole = $userRole;
    }

    public function index()
    {
        $permissions = $this->modelPermission->where('is_delete',0)->get();
        $users = $this->modelUser->where('is_delete',0)->get();
        $roles = $this->modelRole::with('users', 'permissions')
                    ->where('is_delete',0)
                    ->get();
        return view('admin.role.role_index',['permission' => $permissions, 'user'=>$users, 'roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        if(!Gate::allows('add_role', $role)){
            abort(403);
        }
        //dd($request->all());
        $input = $request->only([
            'code_role',
            'full_name_role',
            'permission_check',

        ]);
        $data = [
            'code' => $input['code_role'],
            'full_name' => $input['full_name_role'],
            'permission_check_id'=> $input['permission_check'],
        ];
        $roles = $this->modelRole->create($data);
        $roleId = $roles->id;
        if(count($input['permission_check']) > 0){
            foreach($input['permission_check'] as $key){
                $data_create_permissionRole = [
                    'permission_id' => (int) $key,
                    'role_id' => $roleId,
                ];
                $permissionRoles = $this->modelPermissionRole
                    ->where('permission_id', '=', $data_create_permissionRole['permission_id'])
                    ->where('role_id', '=', $data_create_permissionRole['role_id'])
                    ->first();
                if (empty($permissionRoles)) {
                    $this->modelPermissionRole->create($data_create_permissionRole);
                }
            }
        }
        return response()->json(['success'=>'success post']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $roleId =(int) $request->role_id;
        $roles = $this->modelRole::with('users', 'permissions')->findOrFail($roleId);
        return response()->json(['data'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if(!Gate::allows('edit_role', $role)){
            abort(403);
        }
        $input = $request->only([
            'role_id',
            'code_role',
            'full_name_role',
            'permission_check_id',

        ]);
        $data = [
            'code' => $input['code_role'],
            'full_name' => $input['full_name_role'],
        ];
        $roles = $this->modelRole->find($request->role_id);
        $roles->update($data);
        $role_id = $roles->id;
        $permission_role = $this->modelPermissionRole->where('role_id',$role_id)->where('is_delete',0)->get();
        foreach($permission_role as $value){
            $delPermissionRole = $this->modelPermissionRole->find($value->id);
            $delPermissionRole->delete();
        }
        if(count($input['permission_check_id']) > 0){
            foreach($input['permission_check_id'] as $key){
                $data_create_permissionRole = [
                    'permission_id' => (int) $key,
                    'role_id' =>(int) $input['role_id'],
                ];
                $permissionRoles = $this->modelPermissionRole
                    ->where('permission_id', '=', $data_create_permissionRole['permission_id'])
                    ->where('role_id', '=', $data_create_permissionRole['role_id'])
                    ->first();
                if (empty($permissionRoles)) {
                    $this->modelPermissionRole->create($data_create_permissionRole);
                }
            }
        }

        return response()->json(['success'=>'update seccess role premission']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role)
    {
        if(!Gate::allows('delete_role', $role)) {
            abort(403);
        }
        $roleId = (int) $request->role_id;
        $roles = $this->modelRole->findOrFail($roleId);
        $data_delete = [
            'is_delete'=>1,
        ];
        $roles->update($data_delete);
        return response()->json(['data'=>'update delete role permission user success']);
    }
    public function searchRole(Request $request) {
        if($request->isMethod('post'))
        {
            $key = $request->input('searchRole');
            $data = $this->modelRole
                ->where('code', 'like', '%' .$key.'%')
                ->orderby('id', 'desc')
                ->paginate(config('paginate.show'));
        }
        return view('admin.role.role_index', ['roles' => $data]);
    }
}
