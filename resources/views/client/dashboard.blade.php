@extends('layout.main')

@section('content')

    <h4 class="mb-4">Welcome, {{ auth()->user()->name }} !</h4>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Your Rent Logs</h4>
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

<script>
    $(document).ready( function() {
        $('#datatable').DataTable();
    });
</script>

