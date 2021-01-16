<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Prosiding;
use App\Models\Lektor;
use Illuminate\Http\Request;

class ProsidingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prosidings = Prosiding::where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('prosidi.index',['prosidings'=>$prosidings],['lektors'=>$lektors]);
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
        $request->upload !=null?$request->upload->move(public_path('file/prosiding'),$Name): false;
    
        Prosiding::create([
        'isbn_issn' => $request->isbn_issn,
        'judul' => $request->judul,
        'nama_prosiding' => $request->nama_prosiding,
        'jenis_prosiding' => $request->jenis_prosiding,
        'peran_penulis' => $request->peran_penulis,
        'tahun_prosiding' => $request->tahun_prosiding,
        'nidn' => $request->nidn,
        'volume' => $request->volume,
        'nomor' => $request->nomor,
        'url' => $request->url,
        'upload' => $Name
    ]);
        return redirect('/prosidings');
       // dd($request->upload);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prosiding  $prosiding
     * @return \Illuminate\Http\Response
     */
    public function show(Prosiding $prosiding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prosiding  $prosiding
     * @return \Illuminate\Http\Response
     */
    public function edit(Prosiding $prosiding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prosiding  $prosiding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prosiding $prosiding)
    {
        
        $request->validate([
            'upload'=> 'mimes:docx,pdf',
            
            ]);
            $Name=$request->file;
            
            if($request->upload){
                $Name=$request->upload->getClientOriginalName();
                $request->upload->move(public_path('file/prosiding/'),$Name);
                $hapus = Prosiding::findorfail($prosiding->id);
                $file = public_path('file/prosiding/').$hapus->upload;
                if (file_exists($file)){
                    @unlink($file);
                }
        }
        Prosiding::where('id', $prosiding->id)
        ->update([
        'isbn_issn' => $request->isbn_issn,
        'judul' => $request->judul,
        'nama_prosiding' => $request->nama_prosiding,
        'jenis_prosiding' => $request->jenis_prosiding,
        'peran_penulis' => $request->peran_penulis,
        'tahun_prosiding' => $request->tahun_prosiding,
        'nidn' => $request->nidn,
        'volume' => $request->volume,
        'nomor' => $request->nomor,
        'url' => $request->url,
        'upload' => $Name
        ]);
        return redirect('/prosidings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prosiding  $prosiding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prosiding $prosiding)
    {
        $hapus = Prosiding::findorfail($prosiding->id);
        $file = public_path('file/prosiding/').$hapus->upload;
        if (file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect('/prosidings');
        
    }
}
