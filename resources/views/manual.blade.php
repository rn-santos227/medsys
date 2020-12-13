@foreach ($dispensers as $dispenser)
<div class="modal fade" id="manual_{{ $dispenser->id }}"  role="dialog" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form action="/dispensers/relay" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-cog"></i>&nbsp; Dispenser Manual Activation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="form-control" name="id" id="txt_name" value="{{ $dispenser->id }}">
                    <div class="form-group">
                        <label for="txt_password">Enter Password: </label>
                        <input name="password" id="txt_password" type="password" class="form-control">
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

<script type="text/javascript">
    $('.relay').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            type:"post",
            url: '/dispensers/relay',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "_token": "{{ csrf_token() }}",
                "id": this.id
            },
            success:function(res) {
                console.log(res);
            },
            error:function() {
            }
        });
    });
</script>