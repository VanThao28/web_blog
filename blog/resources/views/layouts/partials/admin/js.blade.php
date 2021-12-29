<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //user
    $(document).ready(function(){
        //save user
        $('#form_user_create').on('submit', function(e){
            e.preventDefault();
            var form = $('#form_user_create')[0];
            var formDataUser = new FormData(form);
            Swal.fire({
                title: 'Do you want to save the user?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.StoreUser') }}',
                        type: 'post',
                        data: formDataUser,
                        contentType: false,
                        processData: false,
                        dataType:'json',
                        success: function(data){
                            Swal.fire('Saved!', '', 'success').then((result) =>{
                                window.location.href='{{ route('admin.index') }}';
                            })
                        },
                        error: function (data){
                            $('#nameError').addClass('d-none');
                            $('#emailError').addClass('d-none');
                            $('#image_usersError').addClass('d-none');
                            $('#passwordError').addClass('d-none');

                            var errors = data.responseJSON;
                            if($.isEmptyObject(errors)==false) {
                                $.each(errors.errors,function(key, value) {
                                    var ErrorID = '#'+key+ 'Error';
                                    $(ErrorID).removeClass("d-none");
                                    $(ErrorID).text(value);
                                })
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });

        //end create user

        //edit user
        $('.btn-modal-edit-user').click(function (){
           var user_id = $(this).data('userid');
           $.ajax({
               url: '{{ route('admin.EditUser') }}',
               type: 'post',
               data:{user_id:user_id},
               dataType: 'json',
               success:function (data){
                   $('#modal_edit_user').find('#user_id').val(data.data.id);
                  $('#modal_edit_user').find('#name').val(data.data.name);
                  $('#modal_edit_user').find('#email').val(data.data.email);
                  $('#modal_edit_user').find('#image_users').html(data.data.image_users);
                  $('#modal_edit_user').find('#password').html(data.data.password);
               }
           });
        });
        //end edit user

        // update user
        $('#button_update_user').on('click', function (e) {
            e.preventDefault();
            var form = $('#form_user_edit')[0];
            var formData = new FormData(form);
            Swal.fire({
                title: 'Do you want to update the user?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Update',
                denyButtonText: `Don't update`,
                timer: 1500,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '{{ route("admin.UpdateUser") }}',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function (data){
                            Swal.fire('Update!', '', 'success').then((result) =>{
                                if(result.isConfirmed) {
                                    window.location.href = '{{ route('admin.index') }}';
                                }
                            });

                        },
                        error: function (data){
                            $('#edit_name_error').addClass('d-none');
                            $('#edit_email_error').addClass('d-none');
                            $('#edit_image_users_error').addClass('d-none');
                            $('#edit_password_error').addClass('d-none');
                            var errors = data.responseJSON;
                            if($.isEmptyObject(errors)==false) {
                                $.each(errors.errors, function(key,value) {
                                   var ErrorId = '#edit_' +key+ '_error';
                                   $(ErrorId).removeClass("d-none");
                                   $(ErrorId).text(value);
                                })
                            }
                        },
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not update', '', 'info')
                }
            })
        });
        //end update user

        //delete user
        $('.btn-delete-user').click(function(e){
            e.preventDefault();
            var user_id = $(this).data('userid');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'post',
                        url: '{{ route("admin.DeleteUser") }}',
                        data: {user_id:user_id},
                        dataType: 'json',
                        success: function(data){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                               if (result.isConfirmed) {
                                   window.location.href= '{{ route('admin.index') }}';
                               }
                            });
                        }
                    });
                }
            })
        });
        //end delete user
    });
    //end user

    // post
    $(document).ready(function () {
        // save post
        $('#form_post_create').on('submit', function (e){
            e.preventDefault();
            var form = $('#form_post_create')[0];
            var formData = new FormData(form);
            Swal.fire({
                title: 'do you want to save?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{route('admin.StorePost')}}',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            Swal.fire('create post success', '', 'success').then((result) =>{
                                if(result.isConfirmed){
                                    window.location.href = '{{ route('admin.postIndex') }}';
                                }
                            });
                        },
                        error: function (data){
                            $('#titleError').addClass('d-none');
                            $('#image_postError').addClass('d-none');
                            $('#topicError').addClass('d-none');
                            $('#contentError').addClass('d-none');
                            $('#is_publicError').addClass('d-none');

                            var errors = data.responseJSON;
                            if ($.isEmptyObject(errors) == false) {
                                $.each(errors.errors, function(key,value) {
                                   var ErrorId = '#'+key+'Error';
                                   $(ErrorId).removeClass("d-none");
                                   $(ErrorId).text(value);
                                });
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info');
                }
            });
        });
        //end create post
        //edit post
        $('.btn_edit_post').click(function (e) {
            e.preventDefault();
            var post_id = $(this).data('postid');

            $.ajax({
                method: 'POST',
                url: '{{ route("admin.EditPost")}}',
                data: {
                    post_id:post_id,
                },
                dataType: 'json',
                success: function (data){
                    $('#modal_edit_post') == data;
                    $('#modal_edit_post').find('#post_id').val(data.data.id);
                    $('#modal_edit_post').find('#title_post').val(data.data.title);
                    $('#modal_edit_post').find('#image_post').html(data.data.image_post);
                    $('#modal_edit_post').find('#user_id').val(data.data.user_id);
                    $('#modal_edit_post').find('#topic_post').val(data.data.topic);
                    $('#modal_edit_post').find('#content_post').val(data.data.contents);
                    if (data.data.is_public == 1){
                        $('#is_public_true').prop("checked", true);
                        $('#is_public_flase').prop("checked", false); // ko de check lai
                    } else{
                        $('#is_public_true').prop("checked", false);
                        $('#is_public_flase').prop("checked", true);
                    }
                },

            });
        });
        //end edit post

        //update post
        $('#button_edit_post').on('click', function (e) {
            e.preventDefault();
            var form = $('#form_post_edit')[0];
            var formData = new FormData(form);
            var check_is_public = $('input[name=is_public]:checked','#form_post_edit').val();
            formData.append('check_is_public',check_is_public); //append them vao formdata
            Swal.fire({
                title: 'Do you want to update the post?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Update',
                denyButtonText: `Don't update`,
                timer: 1500,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '{{ route("admin.UpdatePost") }}',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function (data){
                            Swal.fire('Update!', '', 'success').then((result) =>{
                                if(result.isConfirmed) {
                                    window.location.href = '{{ route('admin.postIndex') }}';
                                }
                            });

                        },
                        error: function(data){
                            $('#title_error').addClass('d-none');
                            $('#image_post_error').addClass('d-none');
                            $('#topic_error').addClass('d-none');
                            $('#contents_error').addClass('d-none');
                             var errors = data.responseJSON;
                             if($.isEmptyObject(errors)==false){
                                 $.each(errors.errors, function(key,value){
                                    var ErrorId = '#'+key+'_error';
                                    $(ErrorId).removeClass("d-none");
                                    $(ErrorId).text(value);
                                 });
                             }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not update', '', 'info')
                }
            })
        });
        //end update

        //delete post

        $('.delete_val').on('click', function (e){
           e.preventDefault();
            var post_id = $(this).data('postid');
            console.log(post_id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '{{ route('admin.DeletePost') }}',
                        data: {
                            post_id : post_id,
                        },
                        dataType: 'json',
                        success: function(data){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success',
                            ).then((result) =>{
                                if (result.isConfirmed) {
                                    window.location.href= '{{ route("admin.postIndex") }}';
                                }
                            });
                        }
                    });
                }
            })
        });
    });
    //end post

    //upload anh
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
         }
    };
</script>
