@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="/user-approval" class="btn btn-dark bg-primary border-0 mb-4 col-lg-3 col-sm-4">Approval</a>
                    <a href="/user-banned" class="btn btn-dark mx-2 border-0 mb-4 col-lg-3 col-sm-4">View Banned User</a>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show col-6" role="alert">
                            <i class="mdi mdi-check-all label-icon"></i><strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        <a href="/detail-user/{{ $user->slug }}"><i class="fas fa-eye" ></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

