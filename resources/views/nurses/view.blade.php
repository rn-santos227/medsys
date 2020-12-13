@foreach ($nurses as $nurse)
<div class="modal fade bd-example-modal-lg" id="view_{{ $nurse->id }}" role="dialog" tabindex="-1" aria-labelledby="update_modal" aria-hidden="true" style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; View Details of Nurse ID - {{ $nurse->ref_code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txt_first_name">First Name</label>
                            <input type="text" class="form-control" 
                            value="{{ $nurse->first_name }}" readonly
                            name="first_name" id="txt_first_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txt_middle_name">Middle Name</label>
                            <input type="text" class="form-control" 
                            value="{{ $nurse->middle_name }}" readonly
                            name="middle_name"  id="txt_middle_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="txt_last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $nurse->last_name }}"  
                            id="txt_last_name" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_email">Email Address</label>
                            <input type="txt_email" class="form-control" value="{{ $nurse->email }}" name="email" id="email" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_contact">Contact Number</label>
                            <input type="text" class="form-control" value="{{ $nurse->contact }}" name="contact" id="txt_contact" readonly>
                        </div>
                    </div>                        
                </div>
                <div class="form-group">
                    <label for="txt_address" class="col-form-label">Address</label>
                    <textarea class="form-control" name="address" id="txt_address" readonly>{{ $nurse->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="txt_notes" class="col-form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="txt_notes" readonly>{{ $nurse->notes }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> 
        </div>
    </div>
</div>
@endforeach