@extends('layouts.header')


<div class="content-wrapper container my-4 mx-5">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="float-right" style="float: right;"> <a href="{{ route('register') }}"
                class="btn btn-primary">Register</a></div>

        <h6 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Users /</span> List</h6>
        <div class="card">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <h4 class="card-header fw-bold text-primary">Users</h4>

            <div class="table-responsive text-nowrap m-4">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Action</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        {{-- {{dd($users)}} --}}
                        @forelse($users as $user)
                            <tr class="clickable-row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M Y') !!}</td>
                                <td width="150;">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning ">Edit</a>



                                    <button data-toggle="modal" id="smallButton" class="btn btn-danger"
                                        data-target="#smallModal" title="Delete Project">
                                        Delete</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog"
                                aria-labelledby="smallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="smallBody">
                                            <div>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5 class="text-center">Are you sure you want to delete ?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Yes, Delete
                                                            Project</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="7" align="center">No data found</td>
                            </tr>
                        @endforelse


                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });
</script>

@extends('layouts.footer')
