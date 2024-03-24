@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="/add-book" class="btn btn-dark bg-primary border-0 mb-4 col-lg-3 col-sm-12"><i class="bx bx-plus me-1"></i> Add New</a>

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
                                <th>Book Code</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Cover</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        @foreach ($book->categories as $item)
                                            {{ $item->name }},  
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/cover/'. $book->cover) }}" alt="Book Cover" style="max-height: 200px">
                                    </td>
                                    <td>{{ $book->status }}</td>
                                    <td>
                                        <a href="/edit-book/{{ $book->slug }}" class="mx-3"><i class="fas fa-pencil-alt" ></i></a>

                                        <form action="/destroy-book/{{ $book->slug }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="border-0" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash-alt" style="color: red "></i></button>
                                        </form>
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

</script>

