<form method="POST" action="#" id="form_delete">
    @csrf
    @method('DELETE')
</form>
<div class="modal fade" id="modal-delete" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">do you want to delete?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-dark" id="btn-delete">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@section('script')
    @include('layouts.partials.admin.js')
@endsection
