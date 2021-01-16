@extends('layout/main')
@section('container')
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Laporan Akhir Pengabdian</h6>
        </div>
    </div>
</div>                    
    <div class="card-body">
        <div class="col-md-12">
            <table>
            <tbody>
            @foreach($pengabdians as $data)
                <tr>
                <td></td>
                <td align="center">({{$data->judul}})</td>
                <td></td>
                </tr>
                <tr>
                <td>1</td>
                <td><img src="{{asset('img/pdf.png')}}" height="150" width="150" ></td>
                <td class="col-12">
                <b>Tahun : {{$data->tahun}} </b><br>
                <b>Peran : {{$data->peran}} <b>
                </td>
                </tr>
                <tr>
                <td ></td>
                <td align="center">link download</td>
                <td align="right"> <button class="btn btn-success" data-toggle="modal" data-target="#modalLanjutan{{$data->id}}">Lanjutkan</button></td>
                </tr>
                <tr>
                <td colspan="3"><hr></td>
                </tr>
                <!-- Modal Perbaikan -->
    <div class="modal" id="modalLanjutan{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Lanjutan Penelitian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <form method ="post" action ="/lanjutansPengabdian" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="judul">Judul Penelitian</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror " id="judul" name="judul" value="{{$data->judul}}" readonly>
                        @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" class="form-control @error('nidn') is-invalid @enderror " id="nidn" name="nidn" value="{{$data->nidn}}" readonly>
                        @error('nidn')<div class="invalid-feedback">{{ $message }} </div>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tahun">Tahun Sebelumnya</label>
                        <input type="text" class="form-control" id="tahun" value="{{$data->tahun}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun">
                    </div>
                </div>
            </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="usulan">Usulan</label>
                        <input type="text" class="form-control" id="usulan" name="usulan" value="pengabdian" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="logbook">Log Book</label>
                        <input type="file" class="form-control-file" id="logbook" name="logbook">
                        <strong class="text-danger">*max size file 5mb </strong>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="laporan_kemajuan">Laporan Kemajuan</label>
                        <input type="file" class="form-control-file" id="laporan_kemajuan" name="laporan_kemajuan">
                        <strong class="text-danger">*max size file 5mb </strong>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="laporan_akhir">Laporan Akhir</label>
                        <input type="file" class="form-control-file" id="laporan_akhir" name="laporan_akhir">
                        <strong class="text-danger">*max size file 5mb </strong>
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
            </tbody>
            </table>        
        </div>
    </div>
</div>








@endsection