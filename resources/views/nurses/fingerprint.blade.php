@foreach ($nurses as $nurse)
<div class="modal fade bd-example-modal-lg" id="fingerprint_{{ $nurse->id }}"  role="dialog" tabindex="-1" aria-labelledby="fingerprint_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <form action="/nurses/fingerprint" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-md"></i>&nbsp; Register Nurse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="Scores">
                                <h5>
                                    <label class="col-form-label">Scan Quality : </label>
                                    <input class="form-control" type="text" id="qualityInputBox" size="20" readonly style="background-color:#DCDCDC;text-align:center;">      
                                </h5>   
                            </div>
                            <div id="status"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>  
@endforeach
