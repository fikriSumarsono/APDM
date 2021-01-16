<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lektor;
use App\Models\Research;
use App\Models\Lanjutan;
use App\Models\Pengabdian;
use App\Models\Perbaikan;
use App\Models\User;
use Auth;


class PagesController extends Controller
{
    public function index(){
        
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('menu.Dosen',['lektors'=>$lektors]);
    }
    
    public function LPPM()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $researchs = Research::whereNull('approve')->get()->count();
        $pengabdians = Pengabdian::whereNull('approve')->get()->count();
        $TerimaPenelitian = Research::where('approve','=','Diterima')->get()->count();
        $TerimaPengabdian = Pengabdian::where('approve','=','Diterima')->get()->count();
        $TolakPenelitian= Research::where('approve','=','Ditolak')->get()->count();
        $TolakPengabdian = Pengabdian::where('approve','=','Ditolak')->get()->count();

        $usulan_baru = $researchs + $pengabdians;
        $diterima = $TerimaPenelitian + $TerimaPengabdian;
        $ditolak =  $TolakPenelitian + $TolakPengabdian ;

        return view('menu.LPPM',compact('usulan_baru','diterima','ditolak','lektors'));
    }
    
    public function PenjaminMutu()
    {
        $researchs = Research::whereNull('approve')->get()->count();
        $pengabdians = Pengabdian::whereNull('approve')->get()->count();
        $TerimaPenelitian = Research::where('approve','=','Diterima')->get()->count();
        $TerimaPengabdian = Pengabdian::where('approve','=','Diterima')->get()->count();
        $TolakPenelitian= Research::where('approve','=','Ditolak')->get()->count();
        $TolakPengabdian = Pengabdian::where('approve','=','Ditolak')->get()->count();
        $TerkirimPenelitian = Research::whereNotNull('laporan_kemajuan')->whereNotNull('laporan_akhir')->get()->count();
        $TerkirimPengabdian = Pengabdian::whereNotNull('laporan_kemajuan')->whereNotNull('laporan_akhir')->get()->count();

        $terkirim = $TerkirimPenelitian + $TerkirimPengabdian;
        $usulan_baru = $researchs + $pengabdians;
        $diterima = $TerimaPenelitian + $TerimaPengabdian;
        $ditolak =  $TolakPenelitian + $TolakPengabdian ;
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('menu.PenjaminMutu',compact('usulan_baru','diterima','ditolak','lektors','terkirim'));
    }
    public function kemajuan()
    {
        $researchs = Research::where('approve','=','Diterima')->where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('kemajuan.index',['researchs'=>$researchs],['lektors'=>$lektors]);
    }
    
    public function akhir()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $researchs = Research::where('approve','=','Diterima')->where('nidn','=',auth()->user()->username)->get();
        return view('akhir.index',['researchs'=>$researchs],['lektors'=>$lektors]);
    }
    
    public function perbaikan()
    {
        $perbaikans = Perbaikan::where('usulan','=','penelitian')->where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('perbaikan.index3',['perbaikans'=>$perbaikans],['lektors'=>$lektors]);
    }

    public function lanjutan()
    {
        $researchs = Research::whereNotNull('laporan_akhir')->whereNull('usulan_lanjutan')->where('nidn','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('usulanLanjutan.index',['researchs'=>$researchs],['lektors'=>$lektors]);
    }
    
    public function Tpenelitian()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('Tpenelitian.index',['lektors'=>$lektors]);
    }
    
    public function Tpengabdian()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('Tpengabdian.index',['lektors'=>$lektors]);
    }
    
    public function sinta()
    {
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('sinta.index',['lektors'=>$lektors]);
    }
    public function riwayatPenelitian()
    {
        $researchs = Research::where('nidn','=',auth()->user()->username)->whereIn('approve',['Diterima','Ditolak'])->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('riwayat.index',['lektors'=>$lektors],['researchs'=>$researchs]);
    }
    public function riwayatPengabdian()
    {
        $pengabdians = Pengabdian::where('nidn','=',auth()->user()->username)->whereIn('approve',['Diterima','Ditolak'])->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('riwayat.index2',['lektors'=>$lektors],['pengabdians'=>$pengabdians]);
    }

    public function penelitian()
    {
        $researchs = Research::whereNull('approve')->whereNull('perbaikan_usulan')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('Apenelitian.index',['researchs'=>$researchs],['lektors'=>$lektors]);
    }
    
    public function pengabdian()
    {
        $pengabdians = Pengabdian::whereNull('approve')->whereNull('perbaikan_usulan')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('Apengabdian.index',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }

    public function Lpenelitian()
    {
        $researchs = Research::all();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('laporan.Lpenelitian',['researchs'=>$researchs],['lektors'=>$lektors]);
    }

    public function Lpengabdian()
    {
        $pengabdians = Pengabdian::all();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('laporan.Lpengabdian',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }

    public function PerbaikanUpdate(Request $request, Research $research)
    {
        $request->validate([
            'perbaikan_usulan'=> 'mimes:docx,pdf',

        ]);
        

        
        $Name=$request->perbaikan_usulan !=null? $request->perbaikan_usulan->getClientOriginalName(): '';
        $request->perbaikan_usulan !=null?$request->perbaikan_usulan->move(public_path('file/penelitian/perbaikan'),$Name): false;

        $edit = Research::where('judul',$request->judul);
        $data =[
            'perbaikan_usulan' => $Name,
        ];
        $edit->update($data);
        return redirect('/PerbaikanUsulan');
        //dd($request->all());
    }

    public function KemajuanUpdate(Request $request, Research $research)
    {
        $request->validate([
            'logbook'=> 'mimes:docx,pdf',
            'laporan_kemajuan'=> 'mimes:docx,pdf',

        ]);
        

        
        $Name1=$request->logbook !=null? $request->logbook->getClientOriginalName(): '';
        $request->logbook !=null?$request->logbook->move(public_path('file/penelitian/Logbook'),$Name1): false;
        
        $Name=$request->laporan_kemajuan !=null? $request->laporan_kemajuan->getClientOriginalName(): '';
        $request->laporan_kemajuan !=null?$request->laporan_kemajuan->move(public_path('file/penelitian/Laporan Kemajuan'),$Name): false;

        $edit = Research::where('judul',$request->judul);
        $data =[
            'logbook' => $Name1,
            'laporan_kemajuan' => $Name,
        ];
        $edit->update($data);
        return redirect('/LaporanKemajuan');
        //dd($request->all());
    }
    
    public function AkhirUpdate(Request $request, Research $research)
    {
        $request->validate([
            
            'laporan_akhir'=> 'mimes:docx,pdf',

        ]);
        
        $Name=$request->laporan_akhir !=null? $request->laporan_akhir->getClientOriginalName(): '';
        $request->laporan_akhir !=null?$request->laporan_akhir->move(public_path('file/penelitian/Laporan Akhir'),$Name): false;

        $edit = Research::where('judul',$request->judul);
        $data =[
            'laporan_akhir' => $Name,
        ];
        $edit->update($data);
        return redirect('/LaporanAkhir');
        //dd($request->all());
    }

    public function Kpenelitian()
    {
        $researchs = Research::where('approve','=','Diterima')->whereNotNull('laporan_kemajuan')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('kemajuan.Kkemajuan',['researchs'=>$researchs],['lektors'=>$lektors]);
    }
    public function Kpengabdian()
    {
        $pengabdians = Pengabdian::where('approve','=','Diterima')->whereNotNull('laporan_kemajuan')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('kemajuan.Kkemajuan1',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }
    public function Apenelitian()
    {
        $researchs = Research::where('approve','=','Diterima')->whereNotNull('laporan_akhir')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('akhir.Kakhir',['researchs'=>$researchs],['lektors'=>$lektors]);
    }
    public function Apengabdian()
    {
        $pengabdians = Pengabdian::where('approve','=','Diterima')->whereNotNull('laporan_akhir')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('akhir.Kakhir1',['pengabdians'=>$pengabdians],['lektors'=>$lektors]);
    }

    public function lihatLanjutanPenelitian(){
        $lanjutans = Lanjutan::where('usulan','=','penelitian')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('usulanLanjutan.data_Lpenelitian',compact('lanjutans','lektors'));
    }
    public function lihatLanjutanPengabdian(){
        $lanjutans = Lanjutan::where('usulan','=','pengabdian')->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('usulanLanjutan.data_Lpenelitian',compact('lanjutans','lektors'));
    }
    
}
