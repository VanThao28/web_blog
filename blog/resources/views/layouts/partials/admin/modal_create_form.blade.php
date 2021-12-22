<div class="modal fade" id="modal_create_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
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
                            @foreach($errors->get('title') as $messaged)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{  $messaged }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row  mb-3">
                        <label class="col-md-2 col-form-label">Upload</label>
                        <div class="col-md-10">
                            <input type="file" accept="image/*" name="image_post" id="form_image_post"  onchange="loadFile(event)"  placeholder="Enter file image">
                            <img id="output"/>
                            @foreach($errors->get('image_post') as $messaged)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{  $messaged }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for=" exampleInputEmail1">Topic</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="form_topic" name="topic"  placeholder="Enter topic">
                            @foreach($errors->get('topic') as $messaged)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{  $messaged }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Content</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="form_content" name="Content"  placeholder="Enter Content"></textarea>
                            @foreach($errors->get('Content') as $messaged)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{  $messaged }}</li>
                                    </ul>
                                </div>
                            @endforeach
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
                    @foreach($errors->get('is_public') as $messaged)
                        <div class="alert-danger">
                            <ul>
                                <li>{{  $messaged }}</li>
                            </ul>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-primary" onclick="savepost()">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function savepost(){
    var form = $('#form_post_create')[0];
    var formData = new FormData(form);
    Swal.fire({
        title: 'do you want to save?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: '{{route('admin.StorePost')}}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    Swal.fire('create post success', '', 'success');
                    window.location.href = '{{ route('admin.postIndex') }}';
                },
            });
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info');
            window.location.href = '{{ route('admin.postIndex') }}';
        }
    });

};
</script>
