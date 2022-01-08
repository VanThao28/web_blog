<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Validation;


use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $modelUser;

    public function __construct(User $user)
    {
        $this->modelUser = $user;
    }
    public function index()
    {
        //lấy data user,sắp xếp từ cao đền thấp, hiển thị giá trị trang
        $users = $this->modelUser
            ->orderby('id', 'desc')
            ->where('is_delete',0)
            ->paginate(config('paginate.show'));
        return view('admin.users.index', ['users' => $users]);
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
    public function store(Request $request, User $user)
    {
        if(!Gate::allows('add_user', $user)){
            abort(403);
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/(^([a-zA-z]+)(\d+)?$)/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image_users' =>['required','mimes:jpeg,jpg,png','max:20000'],
            'password' => ['required', Rules\Password::defaults()],
        ]);


        $input = $request->only([
            'name',
            'email',
            'image_users',
            'password',
        ]);
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'formDataUser' => $input['image_users'],
            'password' => $input['password'],
        ];
        $data['password'] = Hash::make($data['password']);
        $file = $request->file('image_users');
        // kiểm tra ngoại lệ

        try {
            if ($file) {
                $file->store('public/users_image/');
                $data['image_name'] = $file->getClientOriginalName();
                $data['image_users'] = $file->hashName();
            }
            $this->modelUser->create($data);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        return response()->json(['success' =>'success user']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

        $userId =(int) $request->user_id;
        $users = $this->modelUser->findOrFail($userId);
        return response()->json(['data'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!Gate::allows('edit_user',$user)){
            abort(403);
        }
        $request->validate([
            'name' => ['string', 'max:255','regex:/(^([a-zA-z]+)(\d+)?$)/u'],
            'email' => ['string', 'email', 'max:255'],
            'image_users' =>['mimes:jpeg,jpg,png','max:20000'],
            'password' => [Rules\Password::defaults()],
        ]);
        $input = $request->only([
            'name',
            'email',
            'image_users',
            'password',
        ]);
        $users = $this->modelUser->find($request->user_id);

        $image_user = empty($input['image_users']) ? $users->image_users : $input['image_users'];
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'image_users' => $image_user,
            'password' => $input['password'],
        ];

        //hash::make dùng mã hóa mật khẩu.
        $file = $request->file('image_users'); // lỗi ko nhận được file image.
        $data['password'] = Hash::make($data['password']);
        // kiểm tra ngoại lệ
        try {
            if ($file) {
                $file->store('public/users_image/');
                $file->getClientOriginalName();
                $data['image_name'] = $file->getClientOriginalName();
                $data['image_users'] = $file->hashName();
            }
            $users->update($data);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        return response()->json(['success'=>'success update user']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if(!Gate::allows('delete_user', $user)){
            abort(403);
        }
        $users = $this->modelUser->findOrFail($request->user_id);
        $data_delete = [
            'is_delete'=>1,
        ];
        $users->update($data_delete);
        return response()->json('delete user success');

    }
    public function search(Request $request) {
        if($request->isMethod('post'))
        {
            $key = $request->input('searchUser');
            $data = $this->modelUser
                ->where('name', 'like', '%' .$key.'%')
                ->orderby('id', 'desc')
                ->paginate(config('paginate.show'));
        }
        return view('admin.users.index', ['users' => $data]);
    }
}
