<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.category', [
            'first' => 'Categories',
            'second' => 'Categories',
            'third' => 'Categories',
            'categories' => Category::all(),
        ]);
    }

    public function addView() {
        return view('admin.category.add', [
            'first' => 'Categories',
            'second' => 'Categories',
            'third' => 'Add Category',
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate(
            ['name' => 'required']
        );

        Category::create($validated);
        return redirect('/categories')->with('success', 'New Category Has Been Added!');
    }

    public function edit($slug) {
        return view('admin.category.edit', [
            'first' => 'Categories',
            'second' => 'Categories',
            'third' => 'Edit Category',
            'category' => Category::where('slug', $slug)->first(),
        ]);
    }

    public function update(Request $request, $slug) {
        $validated = $request->validate(
            ['name' => 'required']
        );

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($validated);
        return redirect('/categories')->with('success', 'Category Has Been Updated!');
    }

    public function destroy($slug) {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('/categories')->with('success', 'Category Has Been Deleted!');
    }

    public function deletedCategory() {
        $category = Category::onlyTrashed()->get();
        return view('admin.category.deleted', [
            'first' => 'Deleted Categories',
            'second' => 'Categories',
            'third' => 'Deleted Categories',
            'categories' => $category,
        ]);
    }

    public function restore($slug) {
        Category::withTrashed()
        ->where('slug', $slug)
        ->restore();

        return redirect('/categories')->with('success', 'Category Restored Successfully!');
    }
}
