<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lektor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('buku.index', ['books'=>$books],['lektors'=>$lektors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required|size:15'
        ]);
        
        Book::create($request->all());
        return redirect('/books');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        Book::where('id', $book->id)
        ->update([
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'nidn' => $request->nidn,
            'url' => $request->url

        ]);
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        Book::destroy($book->id);
        return redirect('/books');
    }
}
