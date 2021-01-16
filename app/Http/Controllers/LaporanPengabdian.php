<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lektor;
use App\Models\Research;
use App\Models\Pengabdian;
use App\Models\Perbaikan;
use App\Models\lanjutan;
use App\Models\User;
use Auth;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\Builder;

class LaporanPengabdian extends Controller
{
    public function kemajuan()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $pengabdians = Pengabdian::where('approve','=','Diterima')->where('nidn','=',auth()->user()->username)->get();
        return view('kemajuan.index2',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }
    
    public function akhir()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $pengabdians = Pengabdian::where('approve','=','Diterima')->where('nidn','=',auth()->user()->username)->get();
        return view('akhir.index2',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }
    
    public function perbaikan()
    {
        $perbaikans = Perbaikan::where('usulan','=','pengabdian')->where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('perbaikan.index4',['perbaikans'=>$perbaikans],['lektors'=>$lektors]);
    }

    public function lanjutan()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $pengabdians = Pengabdian::whereNotNull('laporan_akhir')->where('nidn','=',auth()->user()->username)->get();
        return view('usulanLanjutan.index2',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }

    public function KemajuanUpdate(Request $request, Research $research)
    {
        $request->validate([
            'logbook'=> 'mimes:docx,pdf',
            'laporan_kemajuan'=> 'mimes:docx,pdf',

        ]);
        

        
        $Name1=$request->logbook !=null? $request->logbook->getClientOriginalName(): '';
        $request->logbook !=null?$request->logbook->move(public_path('file/pengabdian/Logbook'),$Name1): false;
        
        $Name=$request->laporan_kemajuan !=null? $request->laporan_kemajuan->getClientOriginalName(): '';
        $request->laporan_kemajuan !=null?$request->laporan_kemajuan->move(public_path('file/pengabdian/Laporan Kemajuan'),$Name): false;

        $edit = Pengabdian::where('judul',$request->judul);
        $data =[
            'logbook' => $Name1,
            'laporan_kemajuan' => $Name,
        ];
        $edit->update($data);
        return redirect('/KemajuanPengabdian');
        //dd($request->all());
    }
    
    public function AkhirUpdate(Request $request, Research $research)
    {
        $request->validate([
            
            'laporan_akhir'=> 'mimes:docx,pdf',

        ]);
        
        $Name=$request->laporan_akhir !=null? $request->laporan_akhir->getClientOriginalName(): '';
        $request->laporan_akhir !=null?$request->laporan_akhir->move(public_path('file/pengabdian/Laporan Akhir'),$Name): false;

        $edit = Pengabdian::where('judul',$request->judul);
        $data =[
            'laporan_akhir' => $Name,
        ];
        $edit->update($data);
        return redirect('/AkhirPengabdian');
        //dd($request->all());
    }

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
         $edit = Pengabdian::where('judul',$request->judul);
         $data =[
             'perbaikan_usulan' => $isi,
         ];
         $edit->update($data);
        return redirect('/PengusulanPengabdian');
    //dd($request->all());

    }

    public function update(Request $request, Perbaikan $perbaikan)
    {
         $request->validate([
             'file'=> 'mimes:docx,pdf',

         ]);
         $Name=$request->file !=null? $request->file->getClientOriginalName(): '';
         $request->file !=null?$request->file->move(public_path('file/pengabdian'),$Name): false;

         $per=NULL;
         $edit = Pengabdian::where('judul',$request->judul);
         $data =[
             'file' => $Name,
             'perbaikan_usulan'=>$per,
         ];
         $edit->update($data);
        
         $hapus = Perbaikan::where('judul',$request->judul);
         $hapus->delete();
         return redirect('/PerbaikanPengabdian');
        //dd($request->all());

    }

    public function simpan(Request $request)
    {
        $request->validate([
            'laporan_kemajuan'=> 'mimes:docx,doc,pdf',
            'logbook'=> 'mimes:docx,pdf',
            'laporan_akhir'=> 'mimes:docx,doc,pdf',

        ]);
        
        
        $Name=$request->laporan_kemajuan !=null? $request->laporan_kemajuan->getClientOriginalName(): '';
        $request->laporan_kemajuan !=null?$request->laporan_kemajuan->move(public_path('file/pengabdian/usulan lanjutan/laporan kemajuan'),$Name): false;
        
        $Name1=$request->logbook !=null? $request->logbook->getClientOriginalName(): '';
        $request->logbook !=null?$request->logbook->move(public_path('file/pengabdian/usulan lanjutan/logbook'),$Name1): false;
        $Name2=$request->laporan_akhir !=null? $request->laporan_akhir->getClientOriginalName(): '';
        $request->laporan_akhir !=null?$request->laporan_akhir->move(public_path('file/pengabdian/usulan lanjutan/laporan akhir'),$Name1): false;

            Lanjutan::create([
            'judul' => $request->judul,
            'nidn' =>$request->nidn,
            'tahun' => $request->tahun,
            'usulan' => $request->usulan,
            'laporan_kemajuan' =>$Name,
            'logbook' =>$Name1,
           
        ]);
        $lanjut= 'Dilanjutkan';
        $edit = Pengabdian::where('judul',$request->judul);
         $data =[
             'usulan_lanjutan' => $lanjut,
             
         ];
         $edit->update($data);
       return redirect('/LanjutanPengabdian');
    }
    
}
