<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Validation;


use App\Models\Post;
use App\Models\User;

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
            ->where('is_delete',0)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        if(!Gate::allows('add_post', $post)) {
            abort(403);
        }
        $request->validate([
            'title' => ['required','string', 'max:100'],
            'image_post' => ['required', 'mimes:jpeg,jpg,png','max:20000'],
            'topic' => ['required', 'string', 'max:50'],
            'contents' => ['required','max:5000'],
            'is_public' => 'required',
        ]);

        $input = $request->only([
            'title',
            'image_post',
            'name_image_post',
            'topic',
            'user_id',
            'contents',
            'is_public',
        ]);

        $data = [
            'title' => $input['title'],
            'formData' => $input['image_post'],
            'topic' => $input['topic'],
            'contents' => $input['contents'],
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
            $error = 'update post error';
            return redirect()
                ->route('admin.postIndex')
                ->with('error', $error);

         }
        return response()->json(['success'=>'success post']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $postId =(int) $request->post_id;
        $posts = $this->modelPost->findOrFail($postId);
        return response()->json(['data'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(!Gate::allows('edit_post', $post)){
            abort(403);
        }
        $request->validate([
            'title' => ['required','string', 'max:200'],
            'image_post' => ['mimes:jpeg,jpg,png','max:20000'],
            'topic' => ['required', 'string', 'max:50'],
            'contents' => ['required','max:100000'],
        ]);
        $input = $request->only([
            'title',
            'image_post',
            'name_image_post',
            'topic',
            'user_id',
            'contents',
            'is_public',
        ]);
        $posts = $this->modelPost->find($request->post_id);

        $image_post  = empty($input['image_post']) ? $posts->image_post : $input['image_post'];

        $data= [
            'title' => $input['title'],
            'image_post' => $image_post,
            'topic' => $input['topic'],
            'user_id' => $input['user_id'],
            'contents' => $input['contents'],
            'is_public' => $input['is_public'],
        ];
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
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'update post error';
            return redirect()
                ->route('admin.postIndex')
                ->with('error', $error);
        }
        return response()->json(['success'=>'success update post']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        if(!Gate::allows('delete_post', $post)) {
            abort(403);
        }
        $postId = (int) $request->post_id;
        $posts = $this->modelPost->findOrFail($postId);
        $data_delete = [
            'is_delete'=>1,
        ];
        $posts->update($data_delete);
        return response()->json(['data'=>$posts]);
    }
    public function search(Request $request) {
       if ($request->isMethod('post'))
       {
           $users = $this->modelUser->get();
           $key = $request->input('searchPost');
           $data = $this->modelPost
               ->where('title', 'like', '%'. $key . '%')
               ->orwhere('name', 'like', '%'. $key . '%')
               ->join('users', 'posts.user_id', '=', 'users.id')
               ->select('posts.*', 'users.name')
               ->paginate(config('paginate.show'));
       }
       return view('admin.post.index', ['posts' => $data, 'users'=> $users]);
    }
}
