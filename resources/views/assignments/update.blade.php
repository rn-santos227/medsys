@foreach ($assignments as $assignment)
<div class="modal fade bd-example-modal-lg" id="update_{{ $assignment->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true"  style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/assignments/update" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Update Task Assignment - {{ $assignment->ref_code }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::open(array('url' => 'assignments')) }}
                    <input type="hidden" class="form-control" name="id" id="txt_id" value="{{ $assignment->id }}">
                    <div class="form-group">
                        <label for="cbo_dispensers">Dispenser Assignment</label>
                        <select class="form-control" name="dispenser_id" id="cbo_dispensers">
                            @foreach($dispensers as $dispenser)
                                <option  {{ $assignment->dispenser_id == $dispenser->id ? 'select' : '' }} value="{{ $dispenser->id }}">{{ $dispenser->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="cbo_patients">Patient Name</label>
                        <select class="form-control" name="patient_id" id="cbo_patients" placeholder="Enter patient name.">
                            @foreach($patients as $patient)
                                <option  {{ $assignment->patient_id == $patient->id ? 'select' : '' }} value="{{ $patient->id }}">{{ $patient->last_name }}, {{ $patient->first_name }} {{ $patient->middle_name }}</option>
                            @endforeach
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="cbo_nurses">Nurse Name</label>
                        <select class="form-control" name="nurse_id" id="cbo_nurses" placeholder="Enter nurse name.">
                            @foreach($nurses as $nurse)
                                <option  {{ $assignment->nurse_id == $nurse->id ? 'select' : '' }} value="{{ $nurse->id }}">{{ $nurse->last_name }}, {{ $nurse->first_name }} {{ $nurse->middle_name }}</option>
                            @endforeach
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="txt_notes" class="col-form-label">Notes</label>
                        <textarea class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here.">{{ $assignment->notes  }}</textarea>
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