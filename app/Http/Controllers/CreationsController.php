<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\Lektor;
use Illuminate\Http\Request;

class CreationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creations = Creation::where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('monumental.index',['creations'=>$creations],['lektors'=>$lektors]);
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
        Creation::create($request->all());
        return redirect('/creations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cretaion  $cretaion
     * @return \Illuminate\Http\Response
     */
    public function show(Creation $creation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cretaion  $cretaion
     * @return \Illuminate\Http\Response
     */
    public function edit(Creation $creation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cretaion  $cretaion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creation $creation)
    {
        Creation::where('id', $creation->id)
        ->update([
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'tingkat' => $request->tingkat,
            'tahun' => $request->tahun,
            'nidn' => $request->nidn,
            'url' => $request->url

        ]);
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cretaion  $cretaion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creation $creation)
    {
        Creation::destroy($creation->id);
        return redirect('/creations');
    }
}
