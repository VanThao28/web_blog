<script type="text/javascript">
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
    //upload anh
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
         }
    };

</script>
