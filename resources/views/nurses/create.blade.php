<div class="modal fade bd-example-modal-lg" id="create"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/nurses/create" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Register Nurse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::open(array('url' => 'nurses')) }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txt_first_name">First Name</label>
                                <input type="text" class="form-control" 
                                name="first_name" id="txt_first_name" placeholder="Enter First Name here.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txt_middle_name">Middle Name</label>
                                <input type="text" class="form-control" 
                                name="middle_name"  id="txt_middle_name" placeholder="Enter Middle Name here.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txt_last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="txt_last_name" placeholder="Enter Last Name here.">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_email">Email Address</label>
                                <input type="txt_email" class="form-control" 
                                name="email" id="email" placeholder="Enter Email here.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_contact">Contact Number</label>
                                <input type="text" class="form-control" 
                                name="contact" id="txt_contact" placeholder="Enter Contact Number here.">
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="txt_address" class="col-form-label">Address</label>
                        <textarea class="form-control" name="address" id="txt_address" placeholder="Enter Address here."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txt_notes" class="col-form-label">Notes</label>
                        <textarea class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here."></textarea>
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