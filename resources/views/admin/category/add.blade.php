@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="/add-category" method="post" class="col-4 col-sm-12">
                            @csrf
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Category Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Enter Category Name" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-sm waves-effect waves-light col-4 col-sm-12">Save</button>
                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection

