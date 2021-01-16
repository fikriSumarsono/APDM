<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Lektor;
use App\Models\Research;
use App\Models\Pengabdian;
use App\Models\User;
use Auth;

class KetuaProdi extends Controller
{
    public function KetuaProdi()
    {
        $researchs = Research::whereNull('approve')->get()->count();
        $pengabdians = Pengabdian::whereNull('approve')->get()->count();
        $TerimaPenelitian = Research::where('approve','=','Diterima')->get()->count();
        $TerimaPengabdian = Pengabdian::where('approve','=','Diterima')->get()->count();
        $TolakPenelitian= Research::where('approve','=','Ditolak')->get()->count();
        $TolakPengabdian = Pengabdian::where('approve','=','Ditolak')->get()->count();

        $usulan_baru = $researchs + $pengabdians;
        $diterima = $TerimaPenelitian + $TerimaPengabdian;
        $ditolak =  $TolakPenelitian + $TolakPengabdian ;
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();

        return view('menu.KetuaProdi',compact('usulan_baru','diterima','ditolak','lektors'));
    }
}
