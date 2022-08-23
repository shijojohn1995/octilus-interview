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
                                    {{-- <button data-toggle="modal" id="smallButton" data-target="#smallModal"
                                        data-attr="{{ route('users.destroy', $user->id) }}" title="Delete">
                                        Delet
                                    </button> --}}
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

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
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.footer')
