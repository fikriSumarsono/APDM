<?php

namespace App\Http\Controllers;

use App\Models\Perbaikan;
use App\Models\Research;
use Illuminate\Http\Request;

class PerbaikansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Perbaikan::create([
             'judul' => $request->judul,
             'nidn' =>$request->nidn,
             'usulan' => $request->usulan,
             'identitas_usulan' =>$request->identitas_usulan,
             'rab' =>$request->rab,
             'dok_pendukung' =>$request->dok_pendukung,
            
         ]);

         $isi='Perbaikan';
         $edit = Research::where('judul',$request->judul);
         $data =[
             'perbaikan_usulan' => $isi,
         ];
         $edit->update($data);


        return redirect('/PengusulanPenelitian');
    //dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(Perbaikan $perbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perbaikan $perbaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perbaikan $perbaikan)
    {
         $request->validate([
             'file'=> 'mimes:docx,pdf',

         ]);
         $Name=$request->file !=null? $request->file->getClientOriginalName(): '';
         $request->file !=null?$request->file->move(public_path('file/penelitian'),$Name): false;

         $per=NULL;
         $edit = Research::where('judul',$request->judul);
         $data =[
             'file' => $Name,
             'perbaikan_usulan'=>$per,
         ];
         $edit->update($data);
        
         $hapus = Perbaikan::where('judul',$request->judul);
         $hapus->delete();
         return redirect('/PerbaikanUsulan');
        //dd($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perbaikan $perbaikan)
    {
        //
    }
}
