@extends('layout/main')

@section('title')

@section('tab')
<div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="{{url('/')}}"  >IDENTITAS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}" >SINTA</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{url('/haks')}}" >HKI</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}" >ARTIKEL PROSIDING</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/books') }}" >BUKU</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
                <li class="nav-item"><a class="nav-link" href="{{('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
                </ul>
</div>


@endsection

@section('container')

    <div class="card-body">
<div class="tab-pane" id="hki">
                    <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-4">
                            <h6 style="font-weight: bold;">DATA HAK KEKAYAAN INTELEKTUAL</h6>
                        </div>
                        <div class="col-md-8" align="right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="nav-icon fas fa-edit"></i>Data Baru</button>                          </div>
                        </div>                     
                    </div>

                      <!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data HKI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/haks" enctype="multipart/form-data">
                @csrf
                <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="judul">Judul HKI</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul HKI" name="judul">
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis">Jenis HKI</label>
                            <input type="text" class="form-control " id="jenis" placeholder="Jenis HKI" name="jenis" >
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Status" name="status" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor_hki">Nomor HKI</label>
                            <input type="text" class="form-control" id="nomor_hki" placeholder="Nomor HKI" name="nomor_hki" maxlength="50" >
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
                            <input type="text" class="form-control" id="nomor_pendaftaran" placeholder="Nomor Pendaftaran" name="nomor_pendaftaran" maxlength="50" >           
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun </label>
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn"  value="{{auth()->user()->username}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" placeholder="URL" name="url">
                        </div>
                    </div>
                </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="upload">Upload</label>
                            <input type="file" class="form-control-file" id="upload" name="upload">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type ="submit" class="btn btn-primary popover-test"> Tambah Data </button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end modal -->

                    <div class="card-body">
                        <div class="col-md-12">
                        <table style="width: 100%;">
                        @if(count($haks)>=1)
                        @foreach($haks as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->judul}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>                              </td>
                            <td>{{$data->status}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <b>Jenis HKI : </b>
                                {{$data->jenis}} |
                            <b>Nomor HKI : </b>
                                {{$data->nomor_hki}} |
                            <b>Nomor Pendaftaran : </b>
                                {{$data->nomor_pendaftaran}}                              </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <b>Tahun : </b>
                                {{$data->tahun}} 
                                                    </td>
                            <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateHKI{{$data->id}}">Update</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusHKI{{$data->id}}">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <a href="{{ $data -> url }}" class="text text-primary">{{ $data -> url }}</a>                             </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="file/HKI/{{$data->upload}}" class="text text-primary" download="{{$data->upload}}">{{ $data -> upload }}</a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>

                         <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusHKI{{$data->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data HKI ini? <span> {{$data->judul}}</span> </h4>
                        </div>
                        <div class="modal-footer">
                            <form action="/haks/{{$data->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary">Hapus Data HKI!</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

              <!-- Modal edit -->
    <div class="modal" id="modalUpdateHKI{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data HKI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method ="post" action ="/haks/{{ $data->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="judul">Judul HKI</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul HKI" name="judul" value="{{$data->judul}}">
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis">Jenis HKI</label>
                            <input type="text" class="form-control " id="jenis" placeholder="Jenis HKI" name="jenis" value="{{$data->jenis}}">
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Status" name="status" value="{{$data->status}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor_hki">Nomor HKI</label>
                            <input type="text" class="form-control" id="nomor_hki" placeholder="Nomor HKI" name="nomor_hki" maxlength="50" value="{{$data->nomor_hki}}">
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
                            <input type="text" class="form-control" id="nomor_pendaftaran" placeholder="Nomor Pendaftaran" name="nomor_pendaftaran" maxlength="50" value="{{$data->nomor_pendaftaran}}">           
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun </label>
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun" value="{{$data->tahun}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn" value="{{$data->nidn}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" placeholder="URL" name="url" value="{{$data->url}}">
                        </div>
                    </div>
                </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="upload">Upload</label>
                            <input type="file" class="form-control-file" id="upload" name="upload">
                        </div>
                    </div>
                
            </div>
        <div class="modal-footer">
            <button type ="submit" class="btn btn-primary popover-test"> Simpan Data </button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<!-- end edit modal -->


                        @endforeach
                        @else
                        <center><b>Belum Ada Data HKI </b></center>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection