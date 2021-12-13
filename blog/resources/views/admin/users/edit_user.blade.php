<x-app-admin>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-5">
                <h4 class="header-title mb-3">Edit User</h4>

                <form ACTION="{{ route('admin.UpdateUser', ['user' => $user->id]) }}" METHOD="POST" id="form_edit" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', @$user->name) }}" required placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', @$user->email) }}" required placeholder="Enter email">
                    </div>
                    <div class="form-group mb-0" name="image">
                        <p>upload</p>
                        <input type="file" class="filestyle" data-btnclass="btn-primary" id="filestyle-4" name="image_users" tabindex="-1" style="display: none;">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password', @$user->password) }}" required autocomplete="current-password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="sub_user">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-admin>
