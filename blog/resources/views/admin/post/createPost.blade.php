<x-app-admin>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-5">
                <h4 class="header-title mb-3">Create User</h4>
                <form ACTION="{{ route('admin.StorePost') }}" METHOD="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Text Title</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="example-textarea" name="title"  placeholder="Enter Title"></textarea>
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
                            <input type="file" accept="image/*" name="image_post" onchange="loadFile(event)"  placeholder="Enter file image">
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
                            <input type="text" class="form-control" id="topic" name="topic"  placeholder="Enter topic">
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
                            <textarea class="form-control" rows="5" id="example-textarea" name="Content"  placeholder="Enter Content"></textarea>
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
                        <input type="radio" name="is_public" id="radio4" value="1">
                        <label for="radio4">
                            hiển thị
                        </label>
                    </div>

                    <div class="radio radio-danger">
                        <input type="radio" name="is_public" id="radio6" value="0">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @section('script')
        @include('layouts.partials.admin.js')
    @endsection
</x-app-admin>
