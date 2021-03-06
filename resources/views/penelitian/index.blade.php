@extends('layout/main')

@section('tab')
<div class="card-header p-2">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link " href="{{url('/')}}"  >IDENTITAS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}" >SINTA</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{url('/researchs')}}" >PENELITIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}" >ARTIKEL PROSIDING</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/books') }}">BUKU</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
    </ul>
</div>


@endsection

@section('container')
<div class="card-body">
    <div class="tab-pane" id="penelitian">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h6 style="font-weight: bold;">RIWAYAT PENELITIAN</h6>
                    </div>
                    <div class="col-md-9" align="right">                          </div>
                </div>                     
            </div>
        <div class="card-body">
            <div class="col-md-12">
                <table style="width: 100%;">
                @if(count($researchs)>=1)
                @foreach($researchs as $data)
                <tr>
                <td>1</td>
                <td>{{$data->judul}}</td>
                </tr>
                <tr>
                <td>                              </td>
                <td>
                <b>Tahun : </b>
                    {{$data->Tahun}} |
                <b>Peran : </b>
                   {{$data->peran}} |
                                          </td>
                </tr>
                <tr>
                <td></td>
                <td>
                <a href="file/penelitian/{{$data->file}}" class="text text-primary" download="{{$data->file}}">{{ $data -> file }}</a>                            </td>
                </tr>
                @endforeach
                @else
                <center><b>Belum Ada Riwayat Penelitian</b></center>
                @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection