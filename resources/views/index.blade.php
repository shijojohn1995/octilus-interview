@extends('layouts.header')


<div class="content-wrapper container my-4 mx-5">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="float-right" style ="float: right;"> <a href="{{ route('register') }}" class="btn btn-primary">SING UP</a></div>

        <h6 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Users /</span> List</h6>
        <div class="card">
            <h4 class="card-header fw-bold text-primary">Users</h4>
            <div class="table-responsive text-nowrap m-4">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>Newsletter</th>
                            <th>Date</th>
                            <th>Action</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    {{-- {{dd($users)}} --}}
                    @forelse($users as $user)

                        <tr class="clickable-row" >
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->country}}</td>
                            <td>{{$user->newsletter}}</td>
                            <td>{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M Y') !!}</td>
                            <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-warning col-12">Edit</a></td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7" align="center">No data found</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
                {!! $users->links() !!}
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>


@extends('layouts.footer')
