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
    // //hiển thị content
    // //

    function toggleText() {
        // Get all the elements from the page
        var see_more = document.getElementById("see_more");

        var showMoreText = document.getElementById("content_full");

        var buttonText = document.getElementById("textButton");

        if (see_more.style.display === "none") {

            showMoreText.style.display = "none";

            see_more.style.display = "inline";

            buttonText.innerHTML = "Show More";
        }

        else {

            showMoreText.style.display = "inline";

            see_more.style.display = "none";

            buttonText.innerHTML = "Show Less";
        }
    }

</script>
