<x-app-admin>
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Role !</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="mt-1">
                <div id="key-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    @if(Auth::user()->can('add_role',$roles))
                        <button class="btn btn-icon btn-success" data-toggle="modal" data-target="#modal_create_role" > Add Role </button>
                    @endif
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div id="key-table_filter" class="dataTables_filter">
                                <label>
                                    Search:
                                    <form action="{{ route('admin.searchRole') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="search" name="searchRole" class="form-control form-control-sm" placeholder="search..." aria-controls="key-table">
                                    </form>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                                <input type="text" tabindex="0">
                            </div>
                            <table id="key-table" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%; position: relative;" role="grid" aria-describedby="key-table_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Position: activate to sort column ascending">Roles</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 256px;" aria-label="Office: activate to sort column ascending">Premission</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Office: activate to sort column ascending">Users</th>
                                    @if(Auth::user()->can('edit_role',$roles) && Auth::user()->can('delete_role',$roles))
                                        <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 57px;" aria-label="Age: activate to sort column ascending">Setting</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr role="row" class="odd">
                                        <td>{{$role->code}}</td>
                                        <td>
                                            @if(count($role->permissions)>0)
                                                @foreach($role->permissions as $permissions)
                                                    <span class="badge badge-success">{{ $permissions->code }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($role->users)>0)
                                                @foreach($role->users as $users)
                                                    <span class="badge badge-success">{{ $users->name }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->can('edit_role',$roles))
                                            <button type="button" class="btn btn-icon btn-primary btn-modal-edit-role-permission-user"
                                                    data-roleId="{{$role->id}}"
                                                    data-toggle="modal"
                                                    data-target="#modal-edit-role-permission-user"
                                            ><i class="fas fa-edit"></i> </button>
                                            @endif
                                            @if(Auth::user()->can('delete_role',$roles))
                                            <button type="button" class="btn btn-icon btn-danger btn-delete-role-permission-user"
                                                        data-roleId="{{$role->id}}"
                                            > <i class="fas fa-trash-alt"></i>
                                            </button>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
{{--    create role--}}
    @include('admin.role.form-modal-role.modal_create_role_form')
{{--    edit user--}}
    @include('admin.role.form-modal-role.modal_edit_role_form')
    @section('script')
        @include('layouts.partials.admin.js_admin')
    @endsection
</x-app-admin>
