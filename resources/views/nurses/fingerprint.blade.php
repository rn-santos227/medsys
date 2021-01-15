@foreach ($nurses as $nurse)
<div class="modal fade bd-example-modal-sm" id="fingerprint_{{ $nurse->id }}"  role="dialog" tabindex="-1" aria-labelledby="fingerprint_modal" aria-hidden="true">
    <div class="modal-dialog modal-sm " role="document">
        <form action="/nurses/fingerprint" method="GET">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Register Nurse Fingerprint</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="txt_first_name">Register Fingerprint of the Nurse.</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Okay</button>
                </div>
            </form>
        </div>
    </div>
</div>  
@endforeach
