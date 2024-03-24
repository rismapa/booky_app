@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 col-lg-6 col-sm-12">
                        <form action="/destroy-user/{{ $user->slug }}" method="post" class="d-inline col-sm-12">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-dark bg-primary border-0 col-sm-12 col-lg-4" onclick="return confirm('Are You Sure?')">Banned User</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" disabled>
                              </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" value="{{ $user->username }}" name="name" id="name" disabled>
                              </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Status</label>
                                <input type="text" class="form-control" value="{{ $user->status }}" name="name" id="name" disabled>
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{ $user->phone }}" name="name" id="name" disabled>
                              </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Address</label>
                                <input type="text" class="form-control" value="{{ $user->address }}" name="name" id="name" disabled>
                              </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rent Logs of {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <x-rent-log-table :rentlog='$logs' />
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

@endsection

