<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Ref. Code</th>
                        <th>Task ID</th>
                        <th>Assigned Nurse</th>
                        <th>Patient</th>
                        <th>Schedule</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                        <tr id="{{ $schedule->id }}">
                            <td>{{ $schedule->ref_code }}</td>
                            <td>{{ $schedule->getTask()->ref_code }}</td>
                            <td>{{ $schedule->getTask()->getNurseName() }}</td>
                            <td>{{ $schedule->getTask()->getPatientName() }}</td>
                            <td>{{ $schedule->getSchedule() }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#view_{{ $schedule->id}}" class="btn text-white bg-primary ml-2"><i class="fa fa-search"></i></button>
                                <button type="button" data-toggle="modal" data-target="#view_{{ $schedule->id}}" class="btn text-white bg-warning ml-2"><i class="fa fa-pencil"></i></button>
                                <button type="button" data-toggle="modal" data-target="#view_{{ $schedule->id}}" class="btn text-white bg-danger ml-2"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>