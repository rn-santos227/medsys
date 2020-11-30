@foreach($medicines as $medicine)
<div class="modal fade bd-example-modal-lg" id="update_{{ $medicine->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -180px">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/medicines/update" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Update Medicine - {{ $medicine->ref_code }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        {{ HTML::ul($errors->all()) }}
                        {{ Form::open(array('url' => 'medicines')) }}
                        <input type="hidden" class="form-control" name="id" id="txt_id" value="{{ $medicine->id }}">
                        <div class="form-group">
                            <label for="txt_name">Medicine Name</label>
                        <input type="text" class="form-control" value="{{ $medicine->name }}" name="name" id="txt_name" placeholder="Enter medicine name.">
                        </div>
                        <div class="form-group">
                            <label for="txt_generic_name">Generic Name</label>
                            <input type="text" class="form-control"  value="{{ $medicine->generic_name }}" name="generic_name" id="txt_generic_name" placeholder="Enter medicine generic name.">
                        </div>
                        <div class="form-group">
                            <label for="txt_brand">Brand Name</label>
                            <input type="text" class="form-control" value="{{ $medicine->brand }}" name="brand" id="txt_brand" placeholder="Enter medicine brand.">
                        </div>
                        <div class="form-group">
                            <label for="txt_brand">Measurement</label>
                            <input type="text" class="form-control" value="{{ $medicine->measurement }}" name="measurement" id="txt_brand" placeholder="Enter unit of measurement.">
                        </div>
                        <div class="form-group">
                            <label for="txt_brand">Expiration</label>
                            <input type="datetime-local" class="form-control" value="{{ $medicine->expiration }}" name="expiration" id="txt_brand" placeholder="Enter expiration date..">
                        </div>
                        <div class="form-group">
                            <label for="txt_notes" class="col-form-label">Notes</label>
                            <textarea class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here.">{{ $medicine->notes }}</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach