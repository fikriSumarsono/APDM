@extends('layout/main')

@section('tab')
<div class="card-header p-2">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link " href="{{url('/')}}"  >IDENTITAS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}" >SINTA</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{url('/prosidings')}}" >ARTIKEL PROSIDING</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/books') }}">BUKU</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
        </ul>
</div>
@endsection



@section('container')
<div class="card-body">
    <div class="tab-pane" id="prosiding">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h6 style="font-weight: bold;">DATA ARTIKEL PROSIDING</h6>
                    </div>
                    <div class="col-md-9" align="right">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="nav-icon fas fa-edit"></i>Data Baru</button>                        </div>
                    </div>                     
                </div>
                <!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Artikel Prosiding</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/prosidings" enctype="multipart/form-data">
                @csrf
                <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="isbn_issn">ISBN/ISSN</label>
                            <input type="text" class="form-control" id="isbn_issn" placeholder="ISBN/ISSN" name="isbn_issn" maxlength="15" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="judul">Judul Prosiding</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Prosiding" name="judul" >
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                </div>

                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_prosiding">Nama Prosiding</label>
                            <input type="text" class="form-control @error('nama_prosiding') is-invalid @enderror" id="nama_prosiding" placeholder="Nama Prosiding" name="nama_prosiding" >
                            @error('nama_prosiding')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_prosiding">Jenis Prosiding</label>
                            <input type="text" class="form-control" id="jenis_prosiding" placeholder="Jenis Prosiding" name="jenis_prosiding" maxlength="15" >
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peran_penulis">Peran Penulis</label>
                            <input type="text" class="form-control" id="peran_penulis" placeholder="Peran Penulis" name="peran_penulis" maxlength="15" >           
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun_prosiding">Tahun </label>
                            <input type="text" class="form-control" id="tahun_prosiding" placeholder="Tahun" name="tahun_prosiding">
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
                            <label for="volume">Volume</label>
                            <input type="text" class="form-control" id="volume" placeholder="Volume" name="volume" maxlength="5" >
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" class="form-control" id="nomor" placeholder="Nomor" name="nomor" maxlength="3" >
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
                    @if(count($prosidings)>=1)
                    @foreach ($prosidings as $data)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{$data->judul}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>                              </td>
                        <td>{{$data->nama_prosiding}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <b>Nomor :  </b>
                        {{$data->nomor}} |
                        <b>ISBN/ISSN : </b>
                        {{$data->isbn_issn}} |
                        <b>Volume : </b>
                        {{$data->volume}}                              </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <b>Tahun : </b>
                            {{$data->tahun_prosiding}} |
                        <b>Peran : </b>
                            {{$data->peran_penulis}} |
                        <b>Jenis Prosiding : </b>
                            {{$data->jenis_prosiding}}                              </td>
                        <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateProsiding{{$data->id}}">Update</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusProsiding{{$data->id}}">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <a href="{{ $data -> url }}" class="text text-primary">{{ $data -> url }}</a>                             </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="file/prosiding/{{$data->upload}}" class="text text-primary" download="{{$data->upload}}">{{ $data -> upload }}</a> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>

                 <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusProsiding{{$data->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data artikel prosiding ini? <span> {{$data->judul}}</span> </h4>
                        </div>
                            <div class="modal-footer">
                                <form action="/prosidings/{{$data->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary">Hapus Data artikel prosiding!</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

            <!-- Modal edit -->
    <div class="modal" id="modalUpdateProsiding{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Artikel Prosiding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method ="post" action ="/prosidings/{{ $data->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="isbn_issn">ISBN/ISSN</label>
                            <input type="text" class="form-control" id="isbn_issn" placeholder="ISBN/ISSN" name="isbn_issn" maxlength="15" value="{{$data->isbn_issn}}">   
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="judul">Judul Prosiding</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Prosiding" name="judul" value="{{$data->judul}}">
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_prosiding">Nama Prosiding</label>
                            <input type="text" class="form-control @error('nama_prosiding') is-invalid @enderror" id="nama_prosiding" placeholder="Nama Prosiding" name="nama_prosiding" value="{{$data->nama_prosiding}}">
                            @error('nama_prosiding')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_prosiding">Jenis Prosiding</label>
                            <input type="text" class="form-control" id="jenis_prosiding" placeholder="Jenis Prosiding" name="jenis_prosiding" maxlength="15" value="{{$data->jenis_prosiding}}">  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peran_penulis">Peran Penulis</label>
                            <input type="text" class="form-control" id="peran_penulis" placeholder="Peran Penulis" name="peran_penulis" maxlength="15" value="{{$data->peran_penulis}}">
                           
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun_prosiding">Tahun </label>
                            <input type="text" class="form-control" id="tahun_prosiding" placeholder="Tahun Prosiding" name="tahun_prosiding" value="{{$data->tahun_prosiding}}">
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
                            <label for="volume">Volume</label>
                            <input type="text" class="form-control" id="volume" placeholder="Volume" name="volume" maxlength="5" value="{{$data->volume}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" class="form-control" id="nomor" placeholder="Nomor" name="nomor" maxlength="3" value="{{$data->nomor}}">                      
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" placeholder="URL" name="url" value="{{$data->url}}">
                        </div>
                    </div>
                </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="file">File Lama</label>
                            <input type="text" class="form-control" id="file" placeholder="URL" name="file" value="{{$data->upload}}">
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
                <center><b>Belum Ada Data Artikel Prosidi</b></center>
                @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection