<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Driver\Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Validation;


use App\Http\Controllers\Admin\AdminUsersControler;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelPost;
    private $modelUser;

    public function __construct(Post $post, User $user)
    {
        $this->modelPost = $post;
        $this->modelUser = $user;
    }

    public function index()
    {
        $users = $this->modelUser->get();

        $posts = $this->modelPost::with('user:id,name')
            ->orderby('id', 'desc')
            ->paginate(config('paginate.show'));
        return view('admin.post.index',[
            'posts'=>$posts,
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->modelUser
                ->pluck('name', 'id') //pluck dung de nhom ban ghi thanh nhom nho
                ->toArray(); //chuyen objcet sang mang hoac kieu du lieu json


        return view('admin.post.createPost', ['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'title' => ['required','string', 'max:200'],
            'image_post' => ['required', 'mimes:jpeg,jpg,png','max:20000'],
            'topic' => ['required', 'string', 'max:50'],
            'Content' => ['required','max:100000'],
            'is_public' => 'required',
        ]);

        $input = $request->only([
            'title',
            'image_post',
            'name_image_post',
            'topic',
            'user_id',
            'Content',
            'is_public',
        ]);

        $data = [
            'title' => $input['title'],
            'formData' => $input['image_post'],
            'topic' => $input['topic'],
            'Content' => $input['Content'],
            'is_public' => $input['is_public'],
        ];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();
        $file = $request->file('image_post');
        try {
            if($file) {
                $file->store('public/post_image/');
                $file->getClientOriginalName();
                $data['name_image_post'] = $file->getClientOriginalName();
                $data['image_post'] = $file->hashName();
            }
            $this->modelPost->create($data);

        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'create post error';

         }
        return response()->json('success post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = $this->modelPost->findOrFail($id);
        try {
            $posts->delete();
            $msg = 'delete post seccess';
            return redirect()
                ->route('admin.postIndex')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'delete post error';
            return redirect()
                ->route('admin.postIndex')
                ->with('error', $error);
        }
    }
    public function search(Request $request) {
       if ($request->isMethod('post'))
       {
           $key = $request->input('searchPost');
           $data = $this->modelPost
               ->where('title', 'like', '%'. $key . '%')
               ->orwhere('name', 'like', '%'. $key . '%')
               ->join('users', 'posts.user_id', '=', 'users.id')
               ->select('posts.*', 'users.name')
               ->paginate(config('paginate.show'));
       }
       return view('admin.post.index', ['posts' => $data]);
    }
    public function postSession(Request $request) {
        $postId =(int) $request->post_id;
        $data = [
            'btn_edit_post' => [
                'id' => $postId
            ],
        ];
        session($data);
        return json_encode($data);
    }
}
