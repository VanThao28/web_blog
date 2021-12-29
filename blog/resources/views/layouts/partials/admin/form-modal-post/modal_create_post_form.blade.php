<div class="modal fade" id="modal_create_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="form_post_create">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Title</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="form_title" name="title"  placeholder="Enter Title"></textarea>

                            <span class="text-danger" id="titleError"></span>
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-md-2 col-form-label">Upload</label>
                        <div class="col-md-10">
                            <input type="file" accept="image/*" name="image_post" id="form_image_post"  onchange="loadFile(event)"  placeholder="Enter file image">
                            <img id="output"/>

                        <br><span class="text-danger" id="image_postError"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for=" exampleInputEmail1">Topic</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="form_topic" name="topic"  placeholder="Enter topic">

                            <span class="text-danger" id="topicError"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Content</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="form_content" name="contents"  placeholder="Enter Content"></textarea>

                            <span class="text-danger" id="contentError"></span>
                        </div>
                    </div>

                    <div class="radio radio-success">
                        <input type="radio" name="is_public" class="is_public" id="radio4" value="1">
                        <label for="radio4">
                            hiển thị
                        </label>
                    </div>

                    <div class="radio radio-danger">
                        <input type="radio" name="is_public" class="is_public" id="radio6" value="0">
                        <label for="radio6">
                            ẩn
                        </label>
                    </div>

                    <span class="text-danger" id="is_publicError"></span><br>
                    <button type="submit" class="btn btn-primary " id="create_post">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

