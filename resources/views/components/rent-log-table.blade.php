<div>
    <table class="table mb-0" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Book Title</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
                @if (Auth::user()->role_id != 2)
                    <th>Action</th>
                @endif
                
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $log)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->book->title }}</td>
                    <td>{{ $log->rent_date }}</td>
                    <td>{{ $log->return_date }}</td>
                    <td class="{{ $log->actual_return_date > $log->return_date ? 'text-bg-danger' : ''  }}">{{ $log->actual_return_date }}</td>
                    @if (Auth::user()->role_id != 2)
                        <td>
                            <form action="/return-book/{{ $log->id }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit"  @if($log->actual_return_date !== null) disabled @endif onclick="return confirm('Are You Sure?')" class="btn btn-primary waves-effect waves-light">Return</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>