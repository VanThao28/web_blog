<div class="modal fade" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form METHOD="POST" enctype="multipart/form-data" id="form_user_edit">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name">
                            <strong class="text-danger" id="edit_name_error"></strong>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">Email address</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email">
                            {{--message validation--}}
                            <strong class="text-danger" id="edit_email_error"></strong>
                        </div>
                    </div>

                    <div class="form-group row  mb-3" name="image_users">
                        <label class="col-md-3 col-form-label">Upload</label>
                        <div class="col-md-9">
                            <input type="file" accept="image/*" name="image_users" id="image_users" onchange="loadFile(event)">
                            <img id="output"/>
                            <strong class="text-danger" id="edit_image_users_error"></strong>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="exampleInputPassword1">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                            {{--message validation--}}
                            <strong class="text-danger" id="edit_password_error"></strong>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="button_update_user">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
