<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all(); // get all books from DB
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
    public function show($id)
    {
        $books = Book::find($id);
        return view('books.show')->with('books', $books);
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()->route('books.index')->with('books_update', 'Book updated successfully!');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('book_delete', 'Book deleted successfully.');
    }




}
