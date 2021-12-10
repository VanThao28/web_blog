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

    });
</script>
