@extends('layout/main')
@section('container')

<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Perbaikan Usulan Penelitian</h6>
        </div>
    </div>
</div>                     
    <div class="card-body">
        <div class="col-md-12">
            <table style="width: 50%;">
            @if(count($perbaikans)>=1)
                @foreach($perbaikans as $data)
                <tr>
                    <td>nama</td>
                    <td>:</td>
                    <td>{{auth()->user()->name}}</td>
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
                    <td>
                    <div class="form-group">
                    @if($data->identitas_usulan)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked value="{{$data->identitas_usulan}}" disabled>
                            <label class="form-check-label">Indentitas Usulan</label>
                        </div>
                    @else
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Indentitas Usulan</label>
                        </div>
                    @endif
                    @if($data->rab)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked value="{{$data->rab}}" disabled> 
                            <label for="rab" class="form-check-label">RAB</label>
                        </div>
                    @else
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled > 
                            <label for="rab" class="form-check-label">RAB</label>
                        </div>
                    @endif
                    @if($data->dok_pendukung)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="dokumen pendukung" checked disabled>
                            <label class="form-check-label">Dokumen Pendukung</label>
                        </div>
                    @else
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="dokumen pendukung" disabled>
                            <label class="form-check-label">Dokumen Pendukung</label>
                        </div>
                    @endif
                    </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalPerbaikan{{ $data->id }}"> Perbaikan </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                <!-- Modal Perbaikan -->
    <div class="modal" id="modalPerbaikan{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Ulang Dokumen Usulan Penelitian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <form method ="post" action ="/perbaikans/{{$data->id}}" enctype="multipart/form-data">
            @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="judul">Judul Penelitian</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror col-6" id="judul" name="judul" value="{{$data->judul}}" readonly>
                        @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                    </div>
                </div>
                <div class="col">
                    <input type="file" class="form-control-file" name="file">
                    <strong class="text-danger">*max size file 5mb </strong>
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
            <center><b>Tidak Ada Perbaikan Usulan</b></center>
            @endif
            </table>
        </div>
    </div>  

@endsection