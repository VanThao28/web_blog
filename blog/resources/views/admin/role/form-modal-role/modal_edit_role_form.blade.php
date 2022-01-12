<div class="modal fade" id="modal-edit-role-permission-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form METHOD="post" enctype="multipart/form-data" id="form_role_permission_edit">
                    @csrf
                    <input type="hidden" name="role_id" id="role_id">
                    <label class="col-md-3" style="margin-bottom: 0px; margin-top: 20px;">Role</label>
                    <div style="border: 1px solid #C2BEBEFF;padding: 10px 10px 0 10px; margin-bottom: 5px">
                        <div class="form-group row">
                            <label class="col-md-3" for="exampleInputEmail1">Code</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input_code_role" name="code_role" required placeholder="Enter code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3" for="exampleInputEmail1">Full name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input_full_name_role" name="full_name_role" required  placeholder="Enter full name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-3"></div>
                                <div class="col-md-5 mb-5">
                                    <label class="col-md-3" for="exampleInputEmail1">Permission</label>
                                    <div class="mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="check_box_permission_edit_all" type="checkbox">
                                            <label for="check_box_permission_edit_all">
                                                ALL
                                            </label>
                                        </div>
                                    </div>
                                    @foreach($permission as $key)
                                        <div class="mb-4">
                                            <div class="checkbox checkbox-success checkBoxPermissionEdit">
                                                <input type="checkbox" class="check_box_permission_edit" id="check_box_permission_edit_{{ $key->id }}" value="{{$key->id}}" data-permission="{{ $key->id }}" name="permission_check_id[{{$key->id}}]"  >
                                                <label for="check_box_permission_edit_{{$key->id}}">
                                                    {{$key->full_name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="button_edit_role">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
