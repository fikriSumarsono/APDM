@extends('layout/main')
@section('container')
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-12">
            <h6 style="font-weight: bold;">Riwayat Usulan Pengabdian</h6>
        </div>
    </div>
</div>                    
    <div class="card-body">
        <div class="col-md-12">
        <table style="width: 100%;" > 
        @if(count($pengabdians)>=1)
            @foreach($pengabdians as $data)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->judul}}</td>
                </tr>
                <tr>
                <td>                              </td>
                <td>
                <b>Tahun : </b>
                    {{$data->tahun}} |
                <b>Peran : </b>
                    {{$data->peran}} |
                                       </td>
                </tr>
                <tr>
                <td></td>
                <td>
                <a href="file/pengabdian/{{$data->file}}" class="text text-primary" download="{{$data->file}}">{{ $data -> file }}</a>                              </td>
                </tr>
                <tr>
                <td></td>
                <td>
                <b>{{$data->approve}}</b>                              </td>
                </tr>
                <tr>
                <td colspan="2"><hr></td>
                </tr>
            @endforeach
            @else
            <center><b>Tidak Ada Riwayat Usulan</b></center>
            @endif

            </table>
        </div>
    </div>
</div>


@endsection