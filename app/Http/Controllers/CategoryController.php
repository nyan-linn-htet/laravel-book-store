<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $cat = Category::all();

        return view('admin.cat-list', ['categories' => $cat]);
    }

    public function add() {
        $category = new Category;
        $category->name = request()->name;
        $category->status = request()->status;
        $category->save();

        return redirect('/admin')->with('info', 'A new category added!');
    }

    public function edit($id) {
        $category = Category::find($id);

        return view('admin.cat-edit', ['category' => $category]);
    }

    public function update($id) {
        $category = Category::find($id);
        $category->name = request()->name;
        $category->status = request()->status;
        $category->update();

        return redirect('/admin')->with('info', 'A category updated!');
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin')->with('info', 'A category deleted!');
    }
}
