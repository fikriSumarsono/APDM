<?php

namespace App\Http\Controllers;

use App\Models\Lektor;
use App\Models\User;
use Illuminate\Http\Request;

class LektorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lek = Lektor::all();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('dosen.index',['lek'=>$lek],['lektors'=>$lektors]);
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
            'foto'=> 'mimes:png,jpg',

        ]);
        
        $Name=$request->foto !=null? $request->foto->getClientOriginalName(): '';
        $request->foto !=null?$request->foto->move(public_path('img'),$Name): false;
    
        Lektor::create([
        'nidn' => $request->nidn,
        'no_ktp' => $request->no_ktp,
        'nama' => $request->nama,
        'tanggal_lahir' => $request->tanggal_lahir,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'skill' => $request->skill, 
        'institusi' => $request->institusi,
        'jabatan' => $request->jabatan,
        'program_studi' => $request->program_studi,
        'pendidikan' => $request->pendidikan,
        'foto' => $Name,
        'alamat' => $request->alamat
        ]);
        return redirect('/lektors');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lektor  $lektor
     * @return \Illuminate\Http\Response
     */
    public function show(Lektor $lektor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lektor  $lektor
     * @return \Illuminate\Http\Response
     */
    public function edit(Lektor $lektor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lektor  $lektor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lektor $lektor)
    {
        $request->validate([
            'foto'=> 'mimes:png,jpg',
            
            ]);
            $Name=$request->file;
            
            if($request->foto){
                $Name=$request->foto->getClientOriginalName();
                $request->foto->move(public_path('img'),$Name);
                $hapus = Lektor::findorfail($lektor->id);
                $file = public_path('img').$hapus->foto;
                if (file_exists($file)){
                    @unlink($file);
                }
        }
        Lektor::where('id', $lektor->id)
        ->update([
            'nidn' => $request->nidn,
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'skill' => $request->skill,
            'institusi' => $request->institusi,
            'jabatan' => $request->jabatan,
            'program_studi' => $request->program_studi,
            'pendidikan' => $request->pendidikan,
            'foto' => $Name,
            'alamat' => $request->alamat
            ]);

            User::where('username',$request->nidn)
            ->update([
                'level'=>$request->jabatan,
            ]);


            return redirect('/lektors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lektor  $lektor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lektor $lektor)
    {
        $hapus = Lektor::findorfail($lektor->id);
        $file = public_path('img').$hapus->foto;
        if (file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect('/lektors');
    }
}
