<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Ref. Code</th>
                        <th>Patient</th>
                        <th>Dispenser Assigned</th>
                        <th>Nurse Assigned</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($assignments as $assignment)
                        <tr id="{{ $assignment->id }}">
                            <td>{{ $assignment->ref_code }}</td>
                            <td>{{ $assignment->getPatientName() }}</td>
                            <td>{{ $assignment->getDispenserName() }}</td>
                            <td>{{ $assignment->getNurseName() }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#view_{{ $assignment->id}}" class="btn text-white bg-primary ml-2"><i class="fa fa-search"></i></button>
                                <button type="button" data-toggle="modal" data-target="#update_{{ $assignment->id}}" class="btn text-white bg-warning ml-2"><i class="fa fa-pencil"></i></button>
                                <button type="button" data-toggle="modal" data-target="#delete_{{ $assignment->id}}" class="btn text-white bg-danger ml-2"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>