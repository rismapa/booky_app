@extends('layout.main')

@section('content')

  <h4 class="mb-4">Welcome, {{ auth()->user()->name }} !</h4>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- books card -->
            <div class="card card-h-100 border-primary">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Books</span>
                            <h4 class="mb-3">
                                <span>{{ $book }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- books card -->
            <div class="card card-h-100 border-success">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Categories</span>
                            <h4 class="mb-3">
                                <span>{{ $category }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- books card -->
            <div class="card card-h-100 border-warning">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Users</span>
                            <h4 class="mb-3">
                                <span>{{ $user }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row-->
    

    
@endsection

