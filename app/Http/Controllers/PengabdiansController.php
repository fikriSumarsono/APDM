<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use App\Models\Lektor;
use Illuminate\Http\Request;

class PengabdiansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $pengabdians = Pengabdian::where('approve','=','Diterima')->where('nidn','=',auth()->user()->username)->get();
        return view('pengabdian.index',['lektors'=>$lektors],['pengabdians'=>$pengabdians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('pengabdian.create',['lektors'=>$lektors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nidn = Lektor::where('nidn','=',$request->nidn)->get();
        foreach($nidn as $data){

        }
        $Name=$request->file !=null? $request->file->getClientOriginalName(): '';
        $request->file !=null?$request->file->move(public_path('file/pengabdian'),$Name): false;
        Pengabdian::create([
            'judul' => $request->judul,
            'nidn' =>$request->nidn,
            'nama' =>$data->nama,
            'tahun' =>$request->tahun,
            'peran' =>$request->peran,
            'file' =>$Name
        ]);
        return redirect('/pengabdians/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengabdian $pengabdian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengabdian $pengabdian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengabdian $pengabdian)
    {
        $edit = Pengabdian::findorfail($pengabdian->id);
        $data =[
            'approve' => $request->approve,
        ];
        $edit->update($data);
        return redirect('/PengusulanPengabdian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengabdian $pengabdian)
    {
        //
    }
}
