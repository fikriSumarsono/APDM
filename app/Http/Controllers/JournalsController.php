<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Journal;
use App\Models\Lektor;
use Illuminate\Http\Request;

class JournalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Journal::where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('jurnal.index',['journals'=>$journals],['lektors'=>$lektors]);
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
            'issn' => 'required|size:15'
        ]);
        Journal::create($request->all());
        return redirect('/journals');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        Journal::where('id', $journal->id)
        ->update([
            'judul' => $request->judul,
            'nama_jurnal' => $request->nama_jurnal,
            'nidn' => $request->nidn,
            'nomor' => $request->nomor,
            'issn' => $request->issn,
            'jenis_publikasi' => $request->jenis_publikasi,
            'peran_penulis' => $request->peran_penulis,
            'tahun' => $request->tahun,
            'volume' => $request->volume,
            'url' => $request->url

        ]);
        return redirect('/journals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        
        Journal::destroy($journal->id);
        return redirect('/journals');
    }
}
