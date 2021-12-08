<x-app-admin>
    <div class="content-page">
        <div class="content">

            <!-- Start container-fluid -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div>
                            <h4 class="header-title mb-3">User !</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="mt-1">
                            <div id="key-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <button class="btn btn-icon btn-success"> <i class="fas fa-plus"></i> </button>
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
                                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 256px;" aria-label="Position: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Office: activate to sort column ascending">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="key-table" rowspan="1" colspan="1" style="width: 57px;" aria-label="Age: activate to sort column ascending">Setting</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $id = (($users->currentPage() - 1) * $users->perPage()) +1;
                                            @endphp
                                            <tbody>

                                                @foreach($users as $user)

                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="sorting_1">{{$id}}</td>
                                                        @php
                                                            $id++;
                                                        @endphp
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <button class="btn btn-icon btn-primary"> <i class="fas fa-edit"></i> </button>
                                                            <button class="btn btn-icon btn-danger"> <i class="fas fa-trash-alt"></i> </button>
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
                                                {{ $users->links('layouts.partials.my-pagination') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

    </div>
</x-app-admin>
