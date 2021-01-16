<?php

namespace App\Http\Controllers;

use App\Models\Hak;
use App\Models\Lektor;
use Illuminate\Http\Request;

class HaksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $haks = Hak::where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('HKI.index',['haks'=>$haks],['lektors'=>$lektors]);
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
            'upload'=> 'mimes:docx,pdf,doc,png,jpg',

        ]);
        

        
        $Name=$request->upload !=null? $request->upload->getClientOriginalName(): '';
        $request->upload !=null?$request->upload->move(public_path('file/HKI'),$Name): false;
    
        Hak::create([
        'judul' => $request->judul,
        'jenis' => $request->jenis,
        'status' => $request->status,
        'tahun' => $request->tahun,
        'nomor_hki' => $request->nomor_hki,
        'nomor_pendaftaran' => $request->nomor_pendaftaran,
        'nidn' => $request->nidn,
        'url' => $request->url,
        'upload' => $Name
    ]);
        return redirect('/haks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hak  $hak
     * @return \Illuminate\Http\Response
     */
    public function show(Hak $hak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hak  $hak
     * @return \Illuminate\Http\Response
     */
    public function edit(Hak $hak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hak  $hak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hak $hak)
    {
      

        $request->validate([
            'upload'=> 'mimes:docx,pdf',

        ]);
        $Name=null;

        if($request->upload){
        $Name=$request->upload->getClientOriginalName();
        $request->upload->move(public_path('file/HKI/'),$Name);
        $hapus = Hak::findorfail($hak->id);
        $file = public_path('file/HKI/').$hapus->upload;
        if (file_exists($file)){
            @unlink($file);
        }
        }
        Hak::where('id', $hak->id)
        ->update([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'tahun' =>$request->tahun,
            'status' => $request->status,
            'nomor_hki' => $request->nomor_hki,
            'nomor_pendaftaran' => $request->nomor_pendaftaran,
            'nidn' => $request->nidn,
            'url' => $request->url,
            'upload' => $Name
        ]);
        return redirect('/haks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hak  $hak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hak $hak)
    {
        $hapus = Hak::findorfail($hak->id);
        $file = public_path('file/HKI/').$hapus->upload;
        if (file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect('/haks');
    }
}
