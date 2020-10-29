@foreach ($dispensers as $dispenser)
<div class="modal fade bd-example-modal-lg" id="update_{{ $dispenser->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true"  style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/dispensers/update" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-cog"></i>&nbsp; Configure Dispenser</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::open(array('url' => 'dispensers')) }}
                    <div class="form-group">
                        <input type="hidden" class="form-control" 
                    name="id" id="txt_name" placeholder="Enter quantity of medicine in dispenser." value="{{ $dispenser->id }}">
                    </div>
                    <div class="form-group">
                        <label for="txt_name">Dispenser Name: </label>
                        <input type="text" class="form-control" 
                    name="name" id="txt_name" placeholder="Enter quantity of medicine in dispenser." value="{{ $dispenser->name }}">
                    </div>
                    <div class="form-group">
                        <label for="cbo_medicines">Medicine Name</label>
                        <select class="form-control" name="medicine_id" id="cbo_medicines" placeholder="Enter medicine name.">
                            @foreach($medicines as $medicine)
                        <option {{ $dispenser->medicine_id == $medicine->id ? 'select' : '' }} value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="txt_name">Quantity</label>
                        <input type="text" class="form-control" 
                    name="capacity" id="txt_name" placeholder="Enter quantity of medicine in dispenser." value="{{ $dispenser->capacity }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_ceiling">Ceiling Level:</label>
                                <input type="text" class="form-control" 
                                name="ceiling" id="txt_ceiling" placeholder="Enter Ceiling Level." value="{{ $dispenser->ceiling }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_critical">Critical Level:</label>
                                <input type="text" class="form-control" 
                                name="critical" id="txt_critical" placeholder="Enter Critical Level." value="{{ $dispenser->critical }}">
                            </div>
                        </div>
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
            </form>
        </div>
    </div>
</div>
@endforeach