<x-app-admin>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-5">
                <h4 class="header-title mb-3">Edit User</h4>
                <form ACTION="{{ route('admin.UpdateUser', ['user' => $user->id]) }}" METHOD="POST" id="form_edit" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', @$user->name) }}" required placeholder="Enter email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="exampleInputEmail1">Email address</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', @$user->email) }}" required placeholder="Enter email">
                        </div>
                    </div>

                    <div class="form-group row  mb-3" name="image_users">
                        <label class="col-md-3 col-form-label">Upload</label>
                        <div class="col-md-9">
                            <input type="file" accept="image/*" name="image_users" onchange="loadFile(event)" value="{{ old('image_users', @$user->image_users) }}">
                            <img id="output"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="exampleInputPassword1">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password', @$user->password) }}" required autocomplete="current-password" placeholder="Password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="sub_user">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @section('script')
        @include('layouts.partials.admin.js')
    @endsection
</x-app-admin>
