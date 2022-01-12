<div class="modal fade" id="modal_create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form METHOD="post" enctype="multipart/form-data" id="form_user_create">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3" for="exampleInputEmail1">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="form_name" name="name" required placeholder="Enter name">
                            <span class="text-danger" id="nameError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="exampleInputEmail1">Email address</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="form_email" name="email" required  placeholder="Enter email">
                            <span class="text-danger" id="emailError"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-3">
                        <label class="col-md-3" for="exampleInputEmail1">Role</label>
                        <div class="col-md-9">
                            <div class="mb-4">
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox_role_all" type="checkbox">
                                    <label for="checkbox_role_all">
                                        ALL
                                    </label>
                                </div>
                            </div>
                            @foreach($roles as $key_role)
                                <div class="mb-4">
                                    <div class="checkbox checkbox-success checkBoxRole">
                                        <input class="check_role" id="check_box_role_{{$key_role->id}}" type="checkbox" data-role="{{$key_role->id}}" value="{{ $key_role->id }}" name="role_check[{{$key_role->id}}]">
                                        <label for="check_box_role_{{$key_role->id}}">
                                            {{$key_role->code}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row  mb-3" name="image_users">
                        <label class="col-md-3 col-form-label">Upload</label>
                        <div class="col-md-9">
                            <input type="file" accept="image/*" name="image_users" id="form_image_users" onchange="loadFile(event)" >
                            <img id="output"/>
                            <br><span class="text-danger" id="image_usersError"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="exampleInputPassword1">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="form_password"  name="password"  required autocomplete="current-password"  placeholder="Password">
                            <span class="text-danger" id="passwordError"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="create_user">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

