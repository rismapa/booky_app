<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $book = Book::query();
        $category = Category::all();

        if (request('title')) {
            $book->where('title', 'like', '%' . request('title') . '%');
        }
        
        return view('book-list', [
            'books' => $book->get(),
            'categories' => $category,
            'categoryCount' => Category::withCount('books')->get(),
            'first' => 'Books List',
            'second' => 'Books List',
            'third' => 'Books List',
        ]);
    }

   
}
