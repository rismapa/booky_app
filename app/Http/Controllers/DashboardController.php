<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard', [
            'first' => 'Dashboard',
            'second' => 'Dashboard',
            'third' => 'Dashboard',
            'category' => Category::count(),
            'book' => Book::count(),
            'user' => User::where('role_id', '2')->where('status', 'active')->count(),
        ]);
    }
}
