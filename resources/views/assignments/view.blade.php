@foreach ($assignments as $assignment)
<div class="modal fade bd-example-modal-lg" id="view_{{ $assignment->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true"  style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; View Task Assignment - {{ $assignment->ref_code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="txt_id" value="{{ $assignment->id }}">
                <div class="form-group">
                    <label for="cbo_dispensers">Dispenser Assignment</label>
                    <input type="text" class="form-control" 
                    value="{{ $assignment->getDispenserName() }}" readonly
                    name="dispenser"  id="txt_dispenser">
                </div>

                <div class="form-group">
                    <label for="cbo_patients">Patient Name</label>
                    <input type="text" class="form-control" 
                    value="{{ $assignment->getPatientName() }}" readonly
                    name="patient"  id="txt_patient">
                </div>

                <div class="form-group">
                    <label for="cbo_nurses">Nurse Assigned</label>
                    <input type="text" class="form-control" 
                    value="{{ $assignment->getNurseName() }}" readonly
                    name="nurse"  id="txt_nure">
                </div>

                <div class="form-group">
                    <label for="cbo_nurses">Nurse Contact</label>
                    <input type="text" class="form-control" 
                    value="{{ $assignment->getNurseContact() }}" readonly
                    name="contact"  id="txt_contact">
                </div>

                <div class="form-group">
                    <label for="txt_notes" class="col-form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here." readonly>{{ $assignment->notes  }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach