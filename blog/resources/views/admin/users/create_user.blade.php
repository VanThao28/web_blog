<x-app-admin>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-5">
                <h4 class="header-title mb-3">Create User</h4>
                <form ACTION="{{ route('admin.StoreUser') }}" METHOD="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3" for="exampleInputEmail1">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter email">
                            {{--message validation--}}
                            @foreach($errors->get('name') as $message)
                                    <div class="alert-danger">
                                        <ul>
                                            <li>{{  $message }}</li>
                                        </ul>
                                    </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3" for="exampleInputEmail1">Email address</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" required  placeholder="Enter email">
                                {{--message validation--}}
                            @foreach($errors->get('email') as $messaged)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{  $messaged }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row  mb-3" name="image_users">
                        <label class="col-md-3 col-form-label">Upload</label>
                        <div class="col-md-9">
                            <input type="file" accept="image/*" name="image_users" required  onchange="loadFile(event)" >
                            <imgs id="output"/>
                            {{--message validation--}}
                            @foreach($errors->get('image_users') as $message)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3" for="exampleInputPassword1">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password"  name="password"  required autocomplete="current-password"  placeholder="Password">
                            {{--message validation--}}
                            @foreach($errors->get('password') as $message)
                                <div class="alert-danger">
                                    <ul>
                                        <li>{{  $message }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @section('script')
        @include('layouts.partials.admin.js')
    @endsection
</x-app-admin>
