<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        //comment id
        $('.reply_comment').click(function() {
            $('.comment_form').hide();
            var commentid = $(this).data('commentid');
            let comment_name = ".comment_form_id_" + commentid;
            $(comment_name).show();
        });

        //comment create
        $('.btn_comment_reply').click(function (){
            $.ajax({
                method:'post',
                url: '{{ route('admin.CommentCreateReply') }}',
                data: $(this).closest('.comment_form').serialize(),
                success:function(data){
                    console.log('success comment');
                    location.reload();
                },
                error:function(data){
                    $('.textComment').addClass('d-none');
                    var errors = data.responseJSON;
                    if($.isEmptyObject(errors)==false){
                        $.each(errors.errors, function(key,value){
                            var ErrorId = '.'+key+'_error';
                            $(ErrorId).removeClass("d-none");
                            $(ErrorId).text(value);
                        });
                    }
                }
            });
        });

        $('.btn_delete_comment').click(function (){
           var delcommentid = $(this).data('delcommentid');
           $.ajax({
               method: 'post',
               url: '{{ route('admin.DeleteComment') }}',
               data: {
                   delcommentid:delcommentid,
               },
               success:function (data) {
                   console.log('delete success');
                   location.reload();
               }
           });
        });
    })
</script>
