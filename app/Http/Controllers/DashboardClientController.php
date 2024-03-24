<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;

class DashboardClientController extends Controller
{
    public function index() {
        // $user = User::where('slug', $slug)->first();
        $rentLog = RentLog::with(['user', 'book'])->where('user_id', auth()->user()->id)->get();
        return view('client.dashboard', [
            'first' => 'Dashboard',
            'second' => 'Dashboard',
            'third' => 'Dashboard',
            'logs' => $rentLog,
        ]);
    }
}
