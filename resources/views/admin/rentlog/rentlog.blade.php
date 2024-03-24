@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="/add-rent" class="btn btn-dark bg-primary border-0 mb-4 col-lg-3 col-sm-6"><i class="bx bx-plus me-1"></i> New Rent</a>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show col-6" role="alert">
                            <i class="mdi mdi-check-all label-icon"></i><strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rent Logs</h4>
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
                    <!-- end col -->
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

<script>
    $(document).ready( function() {
        $('#datatable').DataTable();
    });

    
</script>

{{-- function confirmAndDisable(element, message, url) {
    if (confirm(message)) {
        element.disabled = true; // Menonaktifkan tombol
        window.location.href = '/return-book/{{ $log->id }}'; // Mengarahkan pengguna ke URL setelah konfirmasi
        return false; // Menghentikan perilaku tautan default
    }
    return false;
} --}}

