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
                    <a href="#postcreate" class="btn btn-icon btn-success" > <i class="fas fa-plus"></i> </a>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div id="key-table_filter" class="dataTables_filter">
                                <label>
                                    Search:
                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="key-table">
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
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 50px; align-items: center" aria-label="Office: activate to sort column ascending">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Image Post</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Office: activate to sort column ascending">User_id</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Office: activate to sort column ascending">Content</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Office: activate to sort column ascending">Create Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 57px;" aria-label="Age: activate to sort column ascending">Setting</th>
                                </tr>
                                </thead>
                                @php
                                    $id = (($postt->currentPage() - 1) * $postt->perPage()) +1;
                                @endphp
                                <tbody>

                                @foreach($postt as $post)

                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">{{$id}}</td>
                                        @php
                                            $id++;
                                        @endphp
                                        <td><img src="{{ ShowImageUsers($post->image_post) }}" title="contact-img" class="rounded-circle avatar-sm" alt="null"></td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user_id}}</td>
                                        <td>{{$post->content}}</td>
                                        <td>{{$post->create_at}}</td>
                                        <td>
                                            <a href="#" class="btn btn-icon btn-primary"> <i class="fas fa-edit"></i> </a>
                                            <button class="btn btn-icon btn-danger delete_user"
                                                    data-toggle="modal"
                                                    data-target="#modal-delete"
                                                    data-url="#"> <i class="fas fa-trash-alt"></i>
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
                                {{ $postt->links('layouts.partials.my-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.partials.admin.form_delete_user')
</x-app-admin>
