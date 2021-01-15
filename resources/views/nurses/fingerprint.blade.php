@foreach ($nurses as $nurse)
<div class="modal fade bd-example-modal-lg" id="fingerprint_{{ $nurse->id }}"  role="dialog" tabindex="-1" aria-labelledby="fingerprint_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/nurses/fingerprint" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Register Nurse Fingerprint</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
