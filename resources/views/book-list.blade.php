@extends('layout.main')

@section('content')
    <div class="row">

            <div class="col-xl-9 col-sm-12">
                <div class="row row-cols-1 row-cols-sm-2">
                    @foreach ($books as $book)
                        <div class="col-xl-4 col-sm-6">
                            <div class="card" style="15rem">
                                <div class="text-center mt-3" style="display: flex; justify-content: center; align-items: center; max-height: 300px">
                                    <img src="{{ asset('storage/cover/'. $book->cover) }}" alt="Book Cover" style="max-height: 200px;">
                                </div>
                                <div class="card-body">
                                    <h5 class=""><p  class="text-body">{{ $book->title }}</p></h5>
                                    {{-- <p class="mb-0 font-size-15">Contrary to popular belief, Lorem Ipsum is not simply random text,a Latin professor at Hampden-Sydney College in Virginia.</p> --}}
                                    <div class="mt-3">
                                        <span class="badge bg-primary-subtle text-primary rounded-pill ms-1 float-end font-size-12 {{ $book->status == 'in stock' ? 'bg-primary-subtle text-primary' : 'bg-danger-subtle text-danger' }}">{{ $book->status }}</span>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        

        {{-- Categories --}}
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                        <div class="search-box">
                            <h5 class="mb-3">Search</h5>
                                <form action="/" method="get">
                                    <div class="position-relative">
                                        <input type="text" name="title" class="form-control rounded bg-light border-light mb-3" value="{{ request('title') }}" placeholder="Search Title...">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light col-12">Search</button>
                                </form>
                        </div>
                    <div class="mt-4">
                        <h5 class="mb-3">Categories</h5>
                        <ul class="list-unstyled fw-medium px-2">
                            @foreach ($categories as $category)
                                <li><a href="javascript: void(0);" class="text-body pb-3 d-block border-bottom mb-2">{{ $category->name }}<span class="badge bg-primary-subtle text-primary rounded-pill ms-1 float-end font-size-12">0</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> <!-- end card -->
        </div>
    </div>
@endsection

