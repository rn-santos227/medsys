<div class="modal fade bd-example-modal-lg" id="create"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -180px">
    <div class="modal-dialog modal-lg " role="document">
        <form method="POST" action="/users/create">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Create New Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::open(array('url' => 'users')) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_name">First Name</label>
                                <input class="form-control" type="text" name="first_name" id="first_name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_name">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt_generic_name">Account Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_brand">Account Password</label>
                        <input type="password" name="password" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="txt_brand">Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="form-control" required autofocus>
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