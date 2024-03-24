@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- <a href="/add-categories" class="btn btn-dark bg-primary border-0 mb-4 col-2"><i class="bx bx-plus me-1"></i> Add New</a> --}}

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-border-left alert-dismissible fade show col-4 mt-3 mb-3" role="alert">
                        <i class="mdi mdi-block-helper label-icon"></i>{{ session('success') }}
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
                                <th>Approval</th>
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
                                        <a href="/user-unbanned/{{ $user->slug }}" class="btn btn-primary waves-effect waves-light" onclick="return confirm('Are You Sure?')">Unbanned</a>
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

