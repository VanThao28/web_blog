<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Driver\Exception;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminUsers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminPost extends Controller
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
        $posts = $this->modelPost
            ->join('users', 'posts.user_id', '=', 'users.id') // form posts inter join users on posts.user_id = users.id
            ->select('posts.*', 'users.name')// select posts.*, users.name
            ->orderby('id', 'desc')
            ->paginate(config('paginate.show'));
        return view('admin.post.index',[
            'posts'=>$posts,
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
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'image_post',
            'name_image_post',
            'topic',
            'user_id',
            'Content',
            'is_public',
        ]);

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

            $posts = $this->modelPost->create($data);
            $msg = 'create post success';
            return redirect()
                    ->route('admin.postIndex', ['posts' => $posts->name])
                    ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'create post error';
            return redirect()
                    ->route('admin.postIndex')
                    ->with('error',$error);
         }
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
        $users = $this->modelUser->get();
        $posts = $this->modelPost
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->findOrFail($id);
        return view('admin.post.editPost',[
            'post' =>$posts,
            'users' =>$users,
        ]);
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

        $posts = $this->modelPost->findOrFail($id);

        $data = $request->only([
            'title',
            'image_post',
            'name_image_post',
            'topic',
            'user_id',
            'Content',
            'is_public',
        ]);

        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = (int)$data['user_id'];
        $file = $request->file('image_post');
        try {
            if ($file) {
                $file->store('public/post_image/');
                $file->getClientOriginalName();
                $data['name_image_post'] = $file->getClientOriginalName();
                $data['image_post'] = $file->hashName();
            }
            $posts->update($data);
            $msg = 'update post seccess';
            return redirect()
                ->route('admin.postIndex')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'update post error';
            return redirect()
                ->route('admin.postIndex')
                ->with('error', $error);
        }
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
               ->join('users', 'posts.user_id' , '=', 'users.id')
               ->select('users.name', 'posts.*')
               ->paginate(config('paginate.show'));
       }
       return view('admin.post.index', ['posts' => $data]);
    }
}
