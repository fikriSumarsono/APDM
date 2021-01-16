<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\Lektor;
use Illuminate\Http\Request;

class ResearchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchs = Research::where('approve','=','Diterima')->where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('penelitian.index',['researchs'=>$researchs],['lektors'=>$lektors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('penelitian.create',['lektors'=>$lektors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Name=$request->file !=null? $request->file->getClientOriginalName(): '';
        $request->file !=null?$request->file->move(public_path('file/penelitian'),$Name): false;
        
        $nidn = Lektor::where('nidn','=',$request->nidn)->get();
        foreach($nidn as $data){

        }
        
        
        
        Research::create([
            'judul' => $request->judul,
            'nidn' =>$request->nidn,
            'nama' =>$data->nama,
            'tahun' =>$request->tahun,
            'peran' =>$request->peran,
            'file' =>$Name
        ]);
        return redirect('/researchs/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research)
    {
        //Research::where('id', $research->id)
        //->update([
        //'approve' => $request->approve
        
        //]);
        //return redirect('/PengusulanPenelitian');
        $edit = Research::findorfail($research->id);
        $data =[
            'approve' => $request->approve,
        ];
        $edit->update($data);
        return redirect('/PengusulanPenelitian');
        //dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
        //
    }
}
