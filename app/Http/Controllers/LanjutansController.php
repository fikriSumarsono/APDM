<?php

namespace App\Http\Controllers;

use App\Models\Lanjutan;
use Illuminate\Http\Request;

class LanjutansController extends Controller
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
            'laporan_kemajuan'=> 'mimes:docx,doc,pdf',
            'logbook'=> 'mimes:docx,doc,pdf',
            'laporan_akhir'=> 'mimes:docx,doc,pdf',

        ]);
        
        
        $Name=$request->laporan_kemajuan !=null? $request->laporan_kemajuan->getClientOriginalName(): '';
        $request->laporan_kemajuan !=null?$request->laporan_kemajuan->move(public_path('file/penelitian/usulan lanjutan/laporan kemajuan'),$Name): false;
        
        $Name1=$request->logbook !=null? $request->logbook->getClientOriginalName(): '';
        $request->logbook !=null?$request->logbook->move(public_path('file/penelitian/usulan lanjutan/logbook'),$Name1): false;
        
        $Name2=$request->logbook !=null? $request->logbook->getClientOriginalName(): '';
        $request->logbook !=null?$request->logbook->move(public_path('file/penelitian/usulan lanjutan/logbook'),$Name1): false;
            
        Lanjutan::create([
            'judul' => $request->judul,
            'nidn' =>$request->nidn,
            'tahun' => $request->tahun,
            'usulan' => $request->usulan,
            'laporan_kemajuan' =>$Name,
            'logbook' =>$Name1,
            'laporan_akhir'=>$Name2,
           
        ]);
        $lanjut= 'Dilanjutkan';
        $edit = Research::where('judul',$request->judul);
         $data =[
             'usulan_lanjutan' => $lanjut,
             
         ];
         $edit->update($data);
       return redirect('/UsulanLanjutan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lanjutan  $lanjutan
     * @return \Illuminate\Http\Response
     */
    public function show(Lanjutan $lanjutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lanjutan  $lanjutan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lanjutan $lanjutan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lanjutan  $lanjutan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lanjutan $lanjutan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lanjutan  $lanjutan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lanjutan $lanjutan)
    {
        //
    }
}
