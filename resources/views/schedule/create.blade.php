<div class="modal fade bd-example-modal-lg" id="create"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/schedule/create" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; New Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ HTML::ul($errors->all()) }}
                    {{ Form::open(array('url' => 'schedule')) }}
                    <div class="form-group">
                        <label for="cbo_assignments">Task</label>
                        <select class="form-control" name="task_id" id="cbo_assignments">
                            @foreach($assignments as $assignment)
                                <option value="{{ $assignment->id }}">{{ $assignment->ref_code }}</option>
                            @endforeach
                          </select>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Days</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input ml-3" name="mon" type="checkbox">
                                            Monday
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input ml-3" name="tue" type="checkbox">
                                            Tuesday
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input ml-3" name="wed" type="checkbox">
                                            Wednesday
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label">        
                                            <input class="form-check-input ml-3" name="thu" type="checkbox">
                                            Thursday
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input ml-3" name="fri" type="checkbox">
                                            Friday
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input ml-3" name="sat" type="checkbox">
                                            Saturday
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input ml-3" name="sun" type="checkbox">
                                            Sunday
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txt_brand">Schedule</label>
                        <input type="time" class="form-control" 
                        name="schedule" id="txt_brand" placeholder="Enter Schedule.">
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