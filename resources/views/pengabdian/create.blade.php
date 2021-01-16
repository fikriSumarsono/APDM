
@extends('layout/main')





@section('container')

<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-3">
            <h6 style="font-weight: bold;">Rincian Pengabdian</h6>
        </div>
    </div>
</div>                     
    <div class="card-body">
        <div class="col-md-3">
            <form method ="post" action ="/pengabdians" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="judul">Judul Pengabdian</label>
                    <input type="text" class="form-control" id="judul" placeholder="Judul Pengabdian" name="judul" >
                </div> 
                <div class="form-group">
                    <label for="tahun">Tahun Pengabdian</label>
                    <input type="text" class="form-control" id="tahun" placeholder="Tahun Pengabdian" name="tahun" >
                </div> 
        </div>
    </div>

    <div class="card-header bg-secondary">
        <div class="row">
            <div class="col-md-6" >
                <h6 style="font-weight: bold;">Identitas Pengusul ~ Anggota Peneliti </h6>
            </div>
        </div>                     
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <table style="width: 100%;">
           @foreach($lektors as $data) 
                <tr>
                    <td><b>NIDN </b></td>
                    <td><b>:</b></td>
                    <td><input type="text" class="form-control col-md-4" id="nidn" name="nidn" value="{{$data->nidn}}"></td>
                </tr>
                <tr>
                    <td><b>Nama</b> </td>
                    <td><b>:</b></td>
                    <td>{{$data->nama}}</td>
                </tr>
                <tr>
                    <td> <b>Institusi</b>  </td>
                    <td><b>:</b></td>
                    <td>{{$data->institusi}}                        </td>
                </tr>
                <tr>
                    <td><b>Tugas</b>  </td>
                    <td><b>:</b></td>
                    <td><input type="text" class="form-control col-md-4" name="peran" >                            </td>
                </tr>
               @endforeach 
            </table>
        </div>
    </div>

    

    <div class="row">
          <div class="col-md-12">
              <div class="card-header bg-secondary">
                <h6 style="font-weight: bold;">Dokumen Usulan</h6>
              </div>
              <div class="card-body">
              <table >
                <tr>
                <td><img src="{{url('img/pdf.png')}}" width="200" height="200" ></td>
                <td> <br> 
                <input type="file" class="form-control-file" name="file">
                    <strong class="text-danger">*max size file 5mb </strong>
                </td>
                
                </table>  
                <div class="col-md-12" align="right">
                  
              <button type ="submit" class="btn btn-primary popover-test"> Kirim </button>
              </div>
                </form>
            <!-- /.card -->  
                </div>
              <!-- /.card-body -->
              
            
          </div>
              
        </div>
    
</div>

@endsection



