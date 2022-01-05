<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        //comment id

        $('.btn-reply-comment').click(function() {
            $('.form_comment_display').hide();
            var commentid = $(this).data('commentid');
            $.ajax({
                type: 'post',
                url: '{{ route('admin.CommentId') }}',
                data: {
                    commentid: commentid,
                },
                dataType: 'json',
                success:function (data){
                    console.log('success comment id');
                    $('.comment_form').find('.comment_id').val(data.data.id);
                }
            });
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
                }
            });
        });
    })
</script>
