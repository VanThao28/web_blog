<x-app-admin>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-5">
                <h4 class="header-title mb-3">Update Post</h4>
                <form ACTION="{{ route('admin.UpdatePost', ['post'=> $post->id]) }}" METHOD="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Title</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="example-textarea" name="title" required >{{old('title', @$post->title)}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-md-2 col-form-label">Upload</label>
                        <div class="col-md-10">
                            <input type="file" accept="image/*" name="image_post" onchange="loadFile(event)" placeholder="{{old('image_post', @$post->image_post)}}">
                            <img id="output"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Poster</label>
                       <div class="col-md-10">
                           <select class="custom-select" name="user_id">
                               <option selected="" value="{{ old('user_id', @$post->user_id) }}">{{ old('name', @$post->name) }}</option>
                               @foreach($users as $user)
                                   <option value="{{ $user->id }}">{{ $user->name }}</option>
                               @endforeach
                           </select>
                       </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-2 col-form-label" for=" exampleInputEmail1">Topic</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="topic" name="topic" required value="{{old('topic', @$post->topic)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Content</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="example-textarea" name="Content" required >{{old('Content', @$post->Content)}}</textarea>
                        </div>
                    </div>

                        <div class="radio radio-success">
                                <input type="radio" name="is_public" id="radio4" value="1"
                                   @if(@$post->is_public == 1)
                                       checked
                                    @endif
                                >
                                <label for="radio4">
                                    hiển thị
                                </label>

                        </div>
                        <div class="radio radio-danger">
                                <input type="radio" name="is_public" id="radio6" value="0"
                                   @if(@$post->is_public == 0)
                                       checked
                                    @endif
                                >
                                <label for="radio6">
                                    ẩn
                                </label>

                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @section('script')
        @include('layouts.partials.admin.js')
    @endsection
</x-app-admin>
