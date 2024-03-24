@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show col-6" role="alert">
                        <i class="mdi mdi-check-all label-icon"></i><strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                        <div class="col-lg-6">
                            <form action="/profile/{{ $user->slug }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name" id="name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}" name="username" id="username" disabled>
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Phone</label>
                                    <input type="number " class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" name="phone" id="phone">
                                    @error('phone')
                                    <   div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}" name="address" id="address">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-sm waves-effect waves-light col-4 col-sm-12">Update Profile</button>
                            </form>
                        </div>
                  
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

