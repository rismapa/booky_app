@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="/add-book" method="post" enctype="multipart/form-data" class="col-4">
                            @csrf
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Book Code</label>
                                <input class="form-control @error('book_code') is-invalid @enderror" name="book_code" type="text" placeholder="Enter Book Code" value="{{ old('book_code') }}" required>
                                @error('book_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" type="text" placeholder="Enter Book Title" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="choices-multiple-default" class="form-label font-size-13 text-muted">Categories</label>
                                <select class="form-control" name="categories[]" value="{{ old('categories.0', '') }}" data-trigger name="choices-multiple-default" id="choices-multiple-default" placeholder="Choose Categories" multiple>
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>

                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover</label>
                                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="formFile">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-sm waves-effect waves-light col-4">Save</button>
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
