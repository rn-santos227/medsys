@foreach ($schedules as $schedule)
<div class="modal fade bd-example-modal-lg" id="view_{{ $schedule->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true" style="margin-top: -150px">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; View Schedule Record ID No. {{ $schedule->ref_code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="txt_id" value="{{ $schedule->id }}">
                
                <div class="form-group">
                    <label for="cbo_assignments">Task</label>
                    <input type="text" class="form-control" 
                    value="{{ $schedule->getTask()->ref_code }}" readonly
                    name="task" id="txt_task">
                </div>

                <div class="form-group">
                    <label for="txt_brand">Days</label>
                    <input type="text" class="form-control" 
                    value="{{ $schedule->getSchedule() }}" readonly
                    name="days" id="txt_days">
                </div>

                <div class="form-group">
                    <label for="txt_brand">Schedule</label>
                    <input type="text" class="form-control" 
                    value="{{ $schedule->schedule }}" readonly
                    name="schedule" id="txt_schedule">
                </div>

                <div class="form-group">
                    <label for="txt_notes" class="col-form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="txt_notes" placeholder="Enter Notes here." readonly>{{ $schedule->notes }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach