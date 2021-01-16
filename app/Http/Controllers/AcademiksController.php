<?php

namespace App\Http\Controllers;

use App\Models\Academik;
use App\Models\Lektor;
use Illuminate\Http\Request;

class AcademiksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academiks = Academik::where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('naskah.index',['academiks'=>$academiks],['lektors'=>$lektors]);
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
            'upload'=> 'mimes:docx,pdf',

        ]);
        

        
        $Name=$request->upload !=null? $request->upload->getClientOriginalName(): '';
        $request->upload !=null?$request->upload->move(public_path('file/naskah'),$Name): false;
    
        Academik::create([
        'judul' => $request->judul,
        'jenis' => $request->jenis,
        'peruntukan' => $request->peruntukan,
        'peran' => $request->peran,
        'penyerahan' => $request->penyerahan,
        'pejabat_penerima' => $request->pejabat_penerima,
        'tahun' => $request->tahun,
        'nidn' => $request->nidn,
        'url' => $request->url,
        'upload' => $Name
    ]);
        return redirect('/academiks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academik  $academik
     * @return \Illuminate\Http\Response
     */
    public function show(Academik $academik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academik  $academik
     * @return \Illuminate\Http\Response
     */
    public function edit(Academik $academik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academik  $academik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academik $academik)
    {
        $request->validate([
            'upload'=> 'mimes:docx,pdf',
            
            ]);
            $Name=$request->file;
            
            if($request->upload){
                $Name=$request->upload->getClientOriginalName();
                $request->upload->move(public_path('file/naskah/'),$Name);
                $hapus = Academik::findorfail($academik->id);
                $file = public_path('file/naskah/').$hapus->upload;
                if (file_exists($file)){
                    @unlink($file);
                }
        }
        Academik::where('id', $academik->id)
        ->update([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'peruntukan' => $request->peruntukan,
            'peran' => $request->peran,
            'penyerahan' => $request->penyerahan,
            'pejabat_penerima' => $request->pejabat_penerima,
            'tahun' => $request->tahun,
            'nidn' => $request->nidn,
            'url' => $request->url,
            'upload' => $Name
        ]);
        return redirect('/academiks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academik  $academik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academik $academik)
    {
        $hapus = Academik::findorfail($academik->id);
        $file = public_path('file/naskah/').$hapus->upload;
        if (file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect('/academiks');
    }
}
