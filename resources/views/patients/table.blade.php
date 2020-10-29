<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Ref. Code</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr id="{{ $patient->id }}">
                            <td>{{ $patient->ref_code }}</td>
                            <td>{{ $patient->last_name }}, {{ $patient->first_name }} {{ $patient->middle_name }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->contact }}</td>
                            <td>
                                <button type="button" class="btn text-white bg-primary ml-2"><i class="fa fa-search"></i></button>
                                <button type="button" class="btn text-white bg-warning ml-2"><i class="fa fa-pencil"></i></button>
                                <button type="button" class="btn text-white bg-danger ml-2"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>