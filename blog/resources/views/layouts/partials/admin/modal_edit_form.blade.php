{{--<div class="modal fade" id="modal_edit_post" tabindex="-1" role="dialog" aria-labelledby="modal_edit_post_label" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="modal_edit_post_ladel">Edit Post</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form METHOD="POST" enctype="multipart/form-data" id="form_post_edit">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-md-2 col-form-label" for="example-textarea">Text Title</label>--}}
{{--                        <div class="col-md-10">--}}
{{--                            <textarea class="form-control" rows="5" id="example-textarea" name="title" required >{{old('title', @$post->title)}}</textarea>--}}
{{--                            @foreach($errors->get('title') as $messaged)--}}
{{--                                <div class="alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        <li>{{  $messaged }}</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row  mb-3">--}}
{{--                        <label class="col-md-2 col-form-label">Upload</label>--}}
{{--                        <div class="col-md-10">--}}
{{--                            <input type="file" accept="image/*" name="image_post" onchange="loadFile(event)" placeholder="{{old('image_post', @$post->image_post)}}">--}}
{{--                            <img id="output"/>--}}
{{--                            @foreach($errors->get('image_post') as $messaged)--}}
{{--                                <div class="alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        <li>{{  $messaged }}</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label class="col-md-2 col-form-label">Poster</label>--}}
{{--                        <div class="col-md-10">--}}
{{--                            <select class="custom-select" name="user_id">--}}
{{--                                <option selected="" value="{{ old('user_id', @$post->user_id) }}">{{ old('name', @$post->user->name) }}</option>--}}
{{--                                @foreach($users as $user)--}}
{{--                                    <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row mb-3">--}}
{{--                        <label class="col-md-2 col-form-label" for=" exampleInputEmail1">Topic</label>--}}
{{--                        <div class="col-md-10">--}}
{{--                            <input type="text" class="form-control" id="topic" name="topic" required value="{{old('topic', @$post->topic)}}">--}}
{{--                            @foreach($errors->get('topic') as $messaged)--}}
{{--                                <div class="alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        <li>{{  $messaged }}</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label class="col-md-2 col-form-label" for="example-textarea">Text Content</label>--}}
{{--                        <div class="col-md-10">--}}
{{--                            <textarea class="form-control" rows="5" id="example-textarea" name="Content" required >{{old('Content', @$post->Content)}}</textarea>--}}
{{--                            @foreach($errors->get('Content') as $messaged)--}}
{{--                                <div class="alert-danger">--}}
{{--                                    <ul>--}}
{{--                                        <li>{{  $messaged }}</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="radio radio-success">--}}
{{--                        <input type="radio" name="is_public" id="radio4" value="1"--}}
{{--                               @if(@$post->is_public == 1)--}}
{{--                               checked--}}
{{--                            @endif--}}
{{--                        >--}}
{{--                        <label for="radio4">--}}
{{--                            hiển thị--}}
{{--                        </label>--}}

{{--                    </div>--}}
{{--                    <div class="radio radio-danger">--}}
{{--                        <input type="radio" name="is_public" id="radio6" value="0"--}}
{{--                               @if(@$post->is_public == 0)--}}
{{--                               checked--}}
{{--                            @endif--}}
{{--                        >--}}
{{--                        <label for="radio6">--}}
{{--                            ẩn--}}
{{--                        </label>--}}

{{--                    </div>--}}
{{--                    @foreach($errors->get('is_public') as $messaged)--}}
{{--                        <div class="alert-danger">--}}
{{--                            <ul>--}}
{{--                                <li>{{  $messaged }}</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    <button type="button" class="btn btn-primary" onclick="EditPost()">Submit</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script type="text/javascript">--}}
{{--    function EditPost(){--}}
{{--        var form_edit = $('#form_post_edit')[0];--}}
{{--        var form_data_edit = new FormData(form_edit);--}}
{{--        $.ajax({--}}
{{--            url: '{{ route('admin.EditPost',['id' => $post->id]) }}',--}}
{{--            post_id: post_id,--}}
{{--            type: 'POST',--}}
{{--            data: form_data_edit,--}}
{{--            contentType: false,--}}
{{--            processData: false,--}}
{{--            success: function (data){--}}
{{--                console.log('success');--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
