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
    {{--$(document).ready(function () {--}}
    {{--    $('.btn_edit_post').button(function (e) {--}}
    {{--        var form_edit = $('#form_post_edit')[0];--}}
    {{--        var form_data_edit = new FormData(form_edit);--}}
    {{--        var post_id = $(this).data(postId);--}}
    {{--        var url = "{{ route("admin.SavePost") }}";--}}
    {{--        console.log(url,post_id);--}}
    {{--        $.ajax({--}}
    {{--            url: url,--}}
    {{--            post_id: post_id,--}}
    {{--            type: 'POST',--}}
    {{--            data: form_data_edit,--}}
    {{--            contentType: false,--}}
    {{--            processData: false,--}}
    {{--            success: function (data){--}}
    {{--                console.log('success');--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--});--}}
    //upload anh
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
         }
    };
</script>
