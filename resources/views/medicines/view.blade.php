@foreach ($medicines as $medicine)
<div class="modal fade bd-example-modal-lg" id="view_{{ $medicine->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -180px">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; View Details of Medicine - {{ $medicine->ref_code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="txt_name">Medicine Name</label>
                    <input type="text" class="form-control" value="{{ $medicine->name }}" name="name" id="txt_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txt_generic_name">Generic Name</label>
                        <input type="text" class="form-control"  value="{{ $medicine->generic_name }}" name="generic_name" id="txt_generic_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txt_brand">Brand Name</label>
                        <input type="text" class="form-control" value="{{ $medicine->brand }}" name="brand" id="txt_brand" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txt_brand">Measurement</label>
                        <input type="text" class="form-control" value="{{ $medicine->measurement }}" name="measurement" id="txt_brand" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txt_brand">Expiration</label>
                        <input type="text" class="form-control" value="{{ $medicine->expiration }}" name="expiration" id="txt_brand" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txt_notes" class="col-form-label">Notes</label>
                        <textarea readonly class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here.">{{ $medicine->notes }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach