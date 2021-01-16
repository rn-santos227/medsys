@foreach ($dispensers as $dispenser)
<div class="modal fade" id="maintenance_{{ $dispenser->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form action="/dispensers/maintenance" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-cog"></i>&nbsp; Configure Storage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="form-control" name="id" id="txt_name" value="{{ $dispenser->id }}">
                    <div class="form-group">
                        <label for="toggle_maintenance">Maintenance Mode: </label>
                        <input name="maintenance" {{ $dispenser->maintenance == 0 ? 'checked' : '' }} type="checkbox" id="toggle_maintenance" data-toggle="toggle">
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