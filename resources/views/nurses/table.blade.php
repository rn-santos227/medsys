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
                        @foreach ($nurses as $nurse)
                        <tr id="{{ $nurse->id }}">
                            <td>{{ $nurse->ref_code }}</td>
                            <td>{{ $nurse->last_name }}, {{ $nurse->first_name }} {{ $nurse->middle_name }}</td>
                            <td>{{ $nurse->email }}</td>
                            <td>{{ $nurse->contact }}</td>
                            <td>
                                <button type="button" class="btn text-white bg-primary ml-2"><i class="fa fa-search"></i></button>
                                <button type="button" class="btn text-white bg-success ml-2"><i class="fa fa-hand-pointer-o"></i></button>
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