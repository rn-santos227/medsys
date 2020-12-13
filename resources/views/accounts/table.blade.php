<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Ref. Code</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="{{ $user->id }}">
                            <td>{{ $user->ref_code }}</td>
                            <td>{{ $user->last_name }}, {{ $user->first_name }} </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#view_{{ $user->id}}" class="btn text-white bg-primary ml-2"><i class="fa fa-search"></i></button>
                                <button type="button" data-toggle="modal" data-target="#delete_{{ $user->id }}"  class="btn text-white bg-danger ml-2"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>