<div class="modal fade" id="modal_create_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" >

                <form METHOD="post" enctype="multipart/form-data" id="form_role_create">
                    @csrf

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
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="form-group row">
                                    <label class="col-md-4" for="exampleInputEmail1">Permission</label>
                                <div class="col-md-8 mb-5">

                                    <div class="mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkboxAll" type="checkbox">
                                            <label for="checkboxAll">
                                                ALL
                                            </label>
                                        </div>
                                    </div>
                                    @foreach($permission as $key)
                                        <div class="mb-4">
                                            <div class="checkbox checkbox-success checkBoxPermission">
                                                <input type="checkbox" class="check_permission" id="check_box_permission_{{ $key->id }}" value="{{$key->id}}" data-permissionid="{{ $key->id }}" name="permission_check[{{$key->id}}]">
                                                <label for="check_box_permission_{{$key->id}}">
                                                    {{$key->full_name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
