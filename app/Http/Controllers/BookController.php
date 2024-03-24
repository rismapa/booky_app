<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return view('admin.book.book', [
        'first' => 'Books',
        'second' => 'Books',
        'third' => 'Books',
        'books' => Book::all(),
        ]);
    }

    public function add() {
        return view('admin.book.add', [
            'first' => 'Add Book',
            'second' => 'Books',
            'third' => 'Add Book', 
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'book_code' => 'required|unique:books',
            'title' => 'required',
            'image' => 'file|max:1024'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('/books')->with('success', 'New Book Has Been Added!');
    }

    public function edit($slug) {
        return view('admin.book.edit', [
            'first' => 'Edit Book',
            'second' => 'Books',
            'third' => 'Edit Book', 
            'categories' => Category::all(),
            'book' => Book::where('slug', $slug)->first(),
        ]);
    }

    public function update(Request $request, $slug) {
        $request->validate([
            'title' => 'required',
            'image' => 'file|max:1024'
        ]);

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->slug = null;
        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('/books')->with('success', 'Book Has Been Edited!');
    }

    public function destroy(Request $request, $slug) {
        $book = Book::where('slug', $slug)->first();
        $book->categories()->sync($request->related_id);
        $book->delete();
        return redirect('/books')->with('success', 'Book Has Been Deleted!');
    }
}
