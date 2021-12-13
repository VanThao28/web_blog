<script type="text/javascript">
    $(document).ready(function () {
        $('.delete_user').click(function (e) {
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
</script>
