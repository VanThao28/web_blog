<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('.delete_val').click(function (e) {
            e.preventDefault();
            var delUrl = $(this).data('url');
            $('#form_delete').attr('action', delUrl);
        });
        $('#btn-delete').click(function () {
            $('#form_delete').submit();
        });
        $(".filestyle").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".file_image_label").addClass("selected").html(fileName);
        });
    });
    $(document).ready(function () {
        $('.btn_edit_post').click(function (e) {
            var post_id = $(this).data('postid');
            var image_post = $(this).parent().parent().parent().find('.image_post').val();
            var title_post = $(this).parent().parent().find('.title_post').val();
            console.log(post_id,title_post,image_post);
            $.ajax({
                method: 'POST',
                url: '{{ route("admin.SavePost")}}',
                data: {
                    post_id:post_id,
                },
                success: function (data){
                    console.log('success session post');
                }
            });
        });
    });
    //upload anh
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
         }
    };
</script>
