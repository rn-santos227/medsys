<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Ref. Code</th>
                        <th>Name</th>
                        <th>Generic Name</th>
                        <th>Brand</th>
                        <th>Expiration Date</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medicine)
                        <tr id="{{ $medicine->id }}">
                            <td>{{ $medicine->ref_code }}</td>
                            <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->generic_name }}</td>
                            <td>{{ $medicine->brand }}</td>
                            <td>{{ $medicine->expiration }}</td>
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