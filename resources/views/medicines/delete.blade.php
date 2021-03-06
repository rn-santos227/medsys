@foreach ($medicines as $medicine)
<div class="modal fade" id="delete_{{ $medicine->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form action="/medicines/delete" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="form-control" name="id" id="txt_name" value="{{ $medicine->id }}">
                    <p>Do you want to Delete this Record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>  
@endforeach