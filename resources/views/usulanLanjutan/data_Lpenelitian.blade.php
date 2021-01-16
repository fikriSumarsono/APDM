@extends('layout/main3')
@section('container')
<div class="card">
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Usulan Lanjutan Penelitian</h6>
        </div>
    </div>
</div>                     
    <div class="card-body">
        <div class="col-md-12">
            <table style="width: 50%;">
            @if(count($lanjutans)>=1)
                @foreach($lanjutans as $data)
                <tr>
                    <td>nama</td>
                    <td>:</td>
                    <td></td>
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
                    <td>Log Book</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="file/penelitian/usulan lanjutan/logbook/{{$data->logbook}}" download="{{$data->logbook}}"><button class="btn btn-success"  >DOWNLOAD</button></a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Laporan Kemajuan</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="file/penelitian/usulan lanjutan/laporan kemajuan/{{$data->laporan_kemajuan}}" download="{{$data->laporan_kemajuan}}"><button class="btn btn-success"  >DOWNLOAD</button></a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Laporan Akhir</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="file/penelitian/usulan lanjutan/laporan akhir/{{$data->laporan_akhir}}" download="{{$data->laporan_akhir}}"><button class="btn btn-success"  >DOWNLOAD</button></a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
            @endforeach
            @else
            <center><b>Tidak Ada Usulan Lanjutan</b></center>   
            @endif         
            </table>
        </div>
    </div>  

@endsection