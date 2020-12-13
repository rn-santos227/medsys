@foreach($patients as $patient)
<div class="modal fade bd-example-modal-lg" id="update_{{ $patient->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/patients/create" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Update Patient ID - {{ $patient->ref_code }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        {{ HTML::ul($errors->all()) }}
                        {{ Form::open(array('url' => 'patients')) }}
                        <input type="hidden" class="form-control" name="id" id="txt_id" value="{{ $patient->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txt_first_name">First Name</label>
                                    <input type="text" class="form-control" 
                                    name="first_name" id="txt_first_name" value="{{ $patient->first_name }}" placeholder="Enter First Name here.">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txt_middle_name">Middle Name</label>
                                    <input type="text" class="form-control" 
                                    name="middle_name"  id="txt_middle_name" value="{{ $patient->middle_name }}" placeholder="Enter Middle Name here.">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txt_last_name">Last Name</label>
                                    <input type="text" class="form-control" value="{{ $patient->last_name }}" name="last_name" id="txt_last_name" placeholder="Enter Last Name here.">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txt_email">Email Address</label>
                                    <input type="txt_email" class="form-control" value="{{ $patient->email }}" name="email" id="email" placeholder="Enter Email here.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txt_contact">Contact Number</label>
                                    <input type="text" class="form-control" value="{{ $patient->contact }}" name="contact" id="txt_contact" placeholder="Enter Contact Number here.">
                                </div>
                            </div>                        
                        </div>
                        <div class="form-group">
                            <label for="txt_address" class="col-form-label">Priority</label>
                            <select class="form-control" name="priority" id="cbo_priority" placeholder="set Priority">
                                <option {{ $patient->priority == 0 ? 'select' : '' }} value="0">1</option>
                                <option {{ $patient->priority == 1 ? 'select' : '' }} value="1">2</option>
                                <option {{ $patient->priority == 2 ? 'select' : '' }} value="2">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_address" class="col-form-label">Address</label>
                            <textarea class="form-control" name="home_address" id="txt_address" placeholder="Enter Address here.">{{ $patient->home_address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="txt_notes" class="col-form-label">Notes</label>
                            <textarea class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here.">{{ $patient->notes }}</textarea>
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