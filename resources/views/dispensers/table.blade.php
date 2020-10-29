<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Ref. Code</th>
                        <th>Name</th>
                        <th>Medicine</th>
                        <th>Quantity</th>
                        <th>Maintenance</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($dispensers as $dispenser)
                        <tr id="{{ $dispenser->id }}">
                            <td>{{ $dispenser->ref_code }}</td>
                            <td>{{ $dispenser->name }}</td>
                            <td>{{ $dispenser->getMedicineName() }}</td>
                            <td>{{ $dispenser->capacity }}</td>
                            <td>{{ $dispenser->maintenance == 0 ? 'Yes' : 'No' }}</td>
                            <td>
                            <button data-toggle="modal" data-target="#update_{{ $dispenser->id }}" type="button" class="btn text-white bg-success ml-2"><i class="fa fa-cog"></i></button>
                            <button data-toggle="modal" data-target="#maintenance_{{ $dispenser->id }}" type="button" class="btn text-white bg-warning ml-2"><i class="fa fa-wrench                                    "></i></button>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>