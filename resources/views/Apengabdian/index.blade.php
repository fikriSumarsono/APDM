@extends('layout/main3')
@section('container')
<div class="card">
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Usulan Pengabdian</h6>
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
                    <td>Proposal Penelitian</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="file/penelitian/{{$data->file}}" download="{{$data->file}}"><button class="btn btn-success"  >DOWNLOAD</button></a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>  
                        <form method ="post" action ="/pengabdians/{{$data->id}}" enctype="multipart/form-data">
                        
                        @csrf    
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="approve" id="terima" value="Diterima">
                        <label class="form-check-label" for="terima">
                        Diterima
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="approve" id="tolak" value="Ditolak">
                        <label class="form-check-label" for="tolak">
                        Ditolak
                        </label>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                    <button type ="submit" class="btn btn-primary popover-test"> Kirim </button>
                    </form>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalPerbaikan{{ $data->id }}"> Perbaikan </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                 <!-- Modal Perbaikan -->
    <div class="modal" id="modalPerbaikan{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perbaikan Dokumen Usulan Penelitian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <form method ="post" action ="/perbaik">
            @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="judul">Judul Penelitian</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Buku" name="judul" value="{{$data->judul}}">
                        @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn" value="{{$data->nidn}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="usulan">Usulan</label>
                        <input type="text" class="form-control" id="usulan" name="usulan" value="pengabdian" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="identitas_usulan" value="identias usulan">
                            <label class="form-check-label">Indentitas Usulan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rab" id="rab" value="RAB"> 
                            <label for="rab" class="form-check-label">RAB</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dok_pendukung" value="dokumen pendukung">
                            <label class="form-check-label">Dokumen Pendukung</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type ="submit" class="btn btn-primary popover-test"> Kirim</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
            @endforeach
            @else
            <center><b>Tidak Ada Usulan Baru</b></center>
            @endif
            </table>
           
        </div>
    </div>  

@endsection