<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RentLogController extends Controller
{
    public function index () {
        $rentLog = RentLog::with(['user', 'book'])->get();
        
        return view('admin.rentlog.rentlog', [
            'first' => 'Rent Logs',
            'second' => 'Rent Logs',
            'third' => 'Rent Logs',
            'logs' => RentLog::all(),
        ]);
    }

    public function add() {
        return view('admin.rentlog.add', [
            'first' => 'Add Rent Logs',
            'second' => 'Rent Logs',
            'third' => 'Add Rent Logs',
            'users' => User::where('role_id', 2)->where('status', 'active')->get(),
            'books' => Book::where('status', 'in stock')->get(),
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
        ]);

        $request['rent_date'] = Carbon::now()->format('Y-m-d');
        $request['return_date'] = Carbon::now()->addDays(3)->format('Y-m-d');

        $book = Book::findOrFail($request->book_id);

        if ($book['status'] != 'in stock') {
            return redirect('/add-rent')->with('failed', 'The Book is not available!');
        }
        else {
            $rentCount = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            
            if ($rentCount >= 2) {
                return redirect('/add-rent')->with('failed_rent', 'User has reached the borrowing limit!');
            } 
            
            try {
                DB::beginTransaction();
                // insert data
                RentLog::create($request->all());
                // update status book 
                $book = Book::findOrFail($request->book_id);
                $book->status = 'not available';
                $book->save();
                // save
                DB::commit();
                return redirect('/rent-logs')->with('success', 'The Book Has Been Rent Successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }
    }

    public function update($id) {
        $rent = RentLog::findOrFail($id);
        $rent->actual_return_date = Carbon::now()->format('Y-m-d');
        $rent->save();

        return redirect('/rent-logs')->with('success', 'The Book Has Been Return Successfully!');
    }
}
