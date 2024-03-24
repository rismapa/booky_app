@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
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
                                <th>Categories</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="/restore-category/{{ $category->slug }}" class="mx-3">Restore</a>
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

<script>
    $(document).ready( function() {
        $('#datatable').DataTable();
    });

    // $(document).ready( function() {
    //     $('#datatable').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: '/get-categories',
    //         columns: [
    //             {data: 'id', name: 'id'},
    //             {data: 'name', name: 'name'}
    //         ]
    //     });
    // });
</script>

