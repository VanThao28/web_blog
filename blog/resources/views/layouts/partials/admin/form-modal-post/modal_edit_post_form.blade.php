<div class="modal fade" id="modal_edit_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form METHOD="post" enctype="multipart/form-data" id="form_post_edit">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Title</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="title_post" name="title" required ></textarea>

                            <strong class="text-danger" id="title_error"></strong>
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-md-2 col-form-label">Upload</label>
                        <div class="col-md-10">
                            <input type="file" accept="image/*" name="image_post" id="image_post" onchange="loadFile(event)">
                            <img id="output"/>
                            <br><strong class="text-danger" id="image_post_error"></strong>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Poster</label>
                        <div class="col-md-10">
                            <select class="custom-select" name="user_id" id="user_id">
                                <option selected=""></option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-2 col-form-label" for=" exampleInputEmail1">Topic</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="topic_post" name="topic" required>

                            <strong class="text-danger" id="topic_error"></strong>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Content</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="content_post" name="contents" required ></textarea>

                            <strong class="text-danger" id="contents_error"></strong>
                        </div>
                    </div>


                    <div class="radio radio-success">
                        <input type="radio" name="is_public" id="is_public_true" value="1"
                            @if(@$post->is_public == 1)
                                checked
                            @endif
                        >
                        <label for="is_public_true">
                            hiển thị
                        </label>
                    </div>
                    <div class="radio radio-danger">
                        <input type="radio" name="is_public" id="is_public_flase" value="0"
                            @if(@$post->is_public == 0)
                               checked
                            @endif>
                        <label for="is_public_flase">
                            ẩn
                        </label>

                    </div>

                    <button type="button" class="btn btn-primary" id="button_edit_post">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
