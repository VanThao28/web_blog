<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Mockery\Exception;

class AdminUsers extends Controller
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
        return view('admin.users.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);
        //hash::make dùng mã hóa mật khẩu.
        $data['password'] = Hash::make($data['password']);
        // kiểm tra ngoại lệ
        try {
            $users = $this->modelUser->create($data);
            $msg = 'create users success.';

            return redirect()
                ->route('admin.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        $error = 'create users error.';
        return redirect()
            ->route('admin.index')
            ->with('error', $error);
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
    public function edit($id)
    {
        $users = $this->modelUser->findOrFail($id);

        return view('admin.users.edit_user',['user'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $users = $this->modelUser->find($id);

        $data = $request->only([
            'name',
            'email',
            'password',
        ]);
        //hash::make dùng mã hóa mật khẩu.
        $data['password'] =Hash::make($data['password']);

        // kiểm tra ngoại lệ
        try {
            $users->update($data);
            $msg = 'edit users success.';
            //dd($users);
            return redirect()
                ->route('admin.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        $error = 'edit users error.';
        return redirect()
            ->route('admin.index')
            ->with('error', $error);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = $this->modelUser->findOrFail($id);
        try {
            $users ->delete();
            $msg = 'delete users success';
            return redirect()
                ->route('admin.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        $error = 'delete users error';
        return redirect()
            ->route('admin.index')
            ->with('error', $error);

   }
}
