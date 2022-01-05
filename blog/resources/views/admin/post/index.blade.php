<x-app-admin>
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Post !</h4>
            </div>
        </div>
    </div>

    <div class="row md-5">
        @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="mt-1">
                <div id="key-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_create_post">
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div id="key-table_filter" class="dataTables_filter">
                                <label>
                                    Search:
                                    <form action="{{ route('admin.searchPost') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="search" name="searchPost" class="form-control form-control-sm" placeholder="search..." aria-controls="key-table">
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Image Post</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 200px; align-items: center" aria-label="Office: activate to sort column ascending">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Office: activate to sort column ascending">Poster</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Office: activate to sort column ascending">Topic</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 200px;" aria-label="Office: activate to sort column ascending">Content</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Office: activate to sort column ascending">Create Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Office: activate to sort column ascending">Display</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px;" aria-label="Office: activate to sort column ascending">Show Post</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 57px;" aria-label="Age: activate to sort column ascending">Setting</th>
                                </tr>
                                </thead>
                                @php
                                    $id = (($posts->currentPage() - 1) * $posts->perPage()) +1;
                                @endphp
                                <tbody>

                                @foreach($posts as $post)

                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">{{$id}}</td>
                                        @php
                                            $id++;
                                        @endphp
                                        <td>
                                            <img src="{{ ShowImagePost($post->image_post) }}" title="contact-img" class="rounded-circle avatar-sm image_post" alt="{{ $post->name_image_post }}">
                                        </td>
                                        <td>
                                            <p class="title">
                                                    <span class="title_post">{{ $post->title }}</span>
                                            </p>
                                        </td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{ $post->topic }}</td>
                                        <td>
                                            <p class="text">
                                                <span>{{substr($post->contents, 0, 200)}} ... </span>{{--substr dung de gioi han tu hien thi--}}
                                            </p>
                                        </td>
                                        <td class="create_at">{{$post->created_at}}</td>
                                         @if($post->is_public == 0)
                                            <td class="is_public">ẩn</td>
                                        @else
                                            <td class="is_public">Hiển thị</td>
                                        @endif
                                        <td style=""><a href="{{ route('clinet.detail',['id' => $post->id]) }}" class="btn btn-icon btn-primary"> <i class="fas fa-eye"></i> </a></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn_edit_post" id="btn_edit_post_id" style="margin-bottom: 5px;"
                                                    data-postId="{{ $post->id }}"
                                                    data-toggle="modal"
                                                    data-target="#modal_edit_post"
                                                    ><i class="fas fa-edit"></i>
                                            </button>

                                            <button class="btn btn-icon btn-danger delete_val"
                                                    data-postId="{{ $post->id }}"
{{--                                                    data-url="{{ route('admin.DeletePost', ['id' => $post->id]) }}"--}}
                                            > <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-md-4">
                            <div class="dataTables_paginate paging_simple_numbers" id="key-table_paginate">
                                {{ $posts->links('layouts.partials.my-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
                {{--    create post--}}
    @include('layouts.partials.admin.form-modal-post.modal_create_post_form')
                {{--    edit post--}}
    @include('layouts.partials.admin.form-modal-post.modal_edit_post_form')

    @section('script')
        @include('layouts.partials.admin.js_admin')
    @endsection
</x-app-admin>
