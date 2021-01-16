@extends('layout/main')
@section('container')
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Catatan Perbaikan</h6>
        </div>
    </div>
</div>                     
    <div class="card-body">
        <div class="col-md-6">
        <form method ="post" action ="/KirimPerbaikan" enctype="multipart/form-data">
        @csrf
        
            <div class="form-group">
                  <label>Judul Pengabdian</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="judul">
                  <option selected>Pilih judul Pengabdian</option>
                  @foreach($pengabdians as $data)
                    <option>{{$data->judul}}</option>
                    @endforeach
                  </select>
                </div>
            
        </div>
    </div>

    <div class="card-header bg-secondary">
        <div class="row">
            <div class="col-md-6" >
                <h6 style="font-weight: bold;">Dokumen Perbaikan </h6>
            </div>
        </div>                     
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <table >
                <tr>
                <td><img src="{{url('img/pdf.png')}}" width="200" height="200" ></td>
                <td> <br> 
                <input type="file" class="form-control-file" name="perbaikan_usulan">
                    <strong class="text-danger">*max size file 5mb </strong>
                </td>
                </tr>
                </table>  
                <div class="col-md-12" align="right"> 
                    <button type ="submit" class="btn btn-primary popover-test"> Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>








@endsection