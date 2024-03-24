@extends('layout.main')

@section('content')

    @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show col-4" role="alert">
            <i class="mdi mdi-block-helper label-icon"></i>{{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('failed_rent'))
        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show col-4" role="alert">
            <i class="mdi mdi-block-helper label-icon"></i>{{ session('failed_rent') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="/add-rent" method="post" class="col-4 col-sm-12">
        @csrf
        <div class="mb-3">
            <label for="choices-multiple-default" class="form-label">Username</label>
            <select class="form-control" name="user_id" data-trigger name="choices-multiple-default" id="choices-multiple-default" placeholder="Choose Username" >
                <option value="">--Select User--</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="choices-multiple-default" class="form-label">Book</label>
            <select class="form-control" name="book_id" data-trigger name="choices-multiple-default" id="choices-multiple-default" placeholder="Choose Username" >
                <option value="">--Select Book-</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-sm waves-effect waves-light col-4 col-sm-12">Save</button>
    </form>
@endsection

