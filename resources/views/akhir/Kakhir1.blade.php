@extends('layout/main3')
@section('container')
<div class="card">
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Laporan Akhir Pengabdian</h6>
        </div>
    </div>
</div>                     
    <div class="card-body">
        <div class="col-md-12">
            <table style="width: 50%;">
            @if(count($pengabdians)>=1)
                @foreach($pengabdians as $data)
                <tr>
                    <td>nama</td>
                    <td>:</td>
                    <td>{{$data->nama}}</td>
                </tr>
                <tr>
                    <td>nidn</td>
                    <td>:</td>
                    <td>{{$data->nidn}}</td>
                </tr>
                <tr>
                    <td>judul Penelitian</td>
                    <td>:</td>
                    <td>{{$data->judul}}</td>
                </tr>
                <tr>
                    <td>peran</td>
                    <td>:</td>
                    <td>{{$data->peran}}</td>
                </tr>
                <tr>
                    <td>Laporan Kemajuan</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="file/pengabdian/Laporan Akhir/{{$data->laporan_akhir}}" download="{{$data->laporan_akhir}}"><button class="btn btn-success"  >DOWNLOAD</button></a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
            @endforeach
            @else
            <center><b>Tidak Ada Laporan Akhir</b></center>
            @endif
            </table>
        </div>
    </div>  

@endsection