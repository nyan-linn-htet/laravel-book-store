<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('admin.book-list', ['books' => $books]);
    }

    public function create()
    {
        $cat = Category::all();

        return view('admin.book-new', ['categories' => $cat]);
    }

    public function add()
    {
        $book = new Book();
        $book->title = request()->title;
        $book->author = request()->author;
        $book->summary = request()->summary;
        $book->price = request()->price;
        $book->category_id = request()->category_id;
        if(request()->cover) {
            $file = request()->cover;
            $name = $file->getClientOriginalName();
            $file->storeAs('public/covers', $name);
            $book->cover = $name;
        }
        $book->save();

        return redirect('/admin/book-list')->with('info', 'A new book added!');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $cat = Category::all();

        return view('admin.book-edit', ['book' => $book, 'categories' => $cat]);
    }

    public function update($id)
    {
        $book = Book::find($id);
        $book->title = request()->title;
        $book->author = request()->author;
        $book->summary = request()->summary;
        $book->price = request()->price;
        $book->category_id = request()->category_id;
        if(request()->cover) {
            Storage::delete("public/covers/$book->cover");
            $file = request()->cover;
            $name = $file->getClientOriginalName();
            $file->storeAs('public/covers', $name);
            $book->cover = $name;
        }
        $book->update();

        return redirect('/admin/book-list')->with('info', 'A book updated!');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        if($book->cover) {
            Storage::delete("public/covers/$book->cover");
        }
        $book->delete();

        return redirect('/admin/book-list')->with('info', 'A book deleted!');
    }
}
