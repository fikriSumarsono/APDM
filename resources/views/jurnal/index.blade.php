@extends('layout/main')

@section('tab')
<div class="card-header p-2">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="{{url('/Dosen')}}"  >IDENTITAS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}">SINTA</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}" >ARTIKEL PROSIDING</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/books') }}" >BUKU</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
    </ul>
</div>


@endsection

@section('container')
<div class="tab-content">
    <div class="card-body">
<div class="tab-pane" id="jurnal">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <h6 style="font-weight: bold;">DATA ARTIKEL JURNAL</h6>
                </div>
            <div class="col-md-9" align="right">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="nav-icon fas fa-edit"></i>Data Baru</button>                          </div>
            </div>                     
        </div>
        <!-- modal tambah -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Artikel Jurnal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/journals" enctype="multipart/form-data">
                @csrf
                <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="judul">Judul Jurnal</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Jurnal" name="judul" required>
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_jurnal">Nama jurnal</label>
                            <input type="text" class="form-control " id="nama_jurnal" placeholder="Nama Jurnal" name="nama_jurnal" >
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn"  value="{{auth()->user()->username}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" class="form-control" id="nomor" placeholder="Nomor" name="nomor" maxlength="3" >   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="issn">ISSN</label>
                            <input type="text" class="form-control" id="issn" placeholder="issn" name="issn" maxlength="15" >  
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_publikasi">Jenis Publikasi </label>
                            <input type="text" class="form-control" id="jenis_publikasi" placeholder="Jenis Publikasi" name="jenis_publikasi">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peran_penulis">Peran penulis</label>
                            <input type="text" class="form-control" id="peran_penulis" placeholder="Peran penulis" name="peran_penulis">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="volume">Volume</label>
                            <input type="text" class="form-control" id="volume" placeholder="Volume" name="volume" maxlength="15" >
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" placeholder="URL" name="url">
                        </div>
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
                @if(count($journals)>=1)
                @foreach ($journals as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->judul}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>                              </td>
                    <td>{{$data->nama_jurnal}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <b>Nomor : </b>
                        {{$data->nomor}} |
                    <b>ISSN : </b>
                        {{$data->issn}} |
                    <b>Volume : </b>
                        {{$data->volume}}                              </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <b>Tahun : </b>
                        {{$data->tahun}} |
                    <b>Peran : </b>
                        {{$data->penulis}} |
                    <b>Jenis Publikasi : </b>
                        {{$data->jenis_publikasi}}                              </td>
                    <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateJurnal{{$data->id}}">Update</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusJurnal{{$data->id}}">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <b class="text text-primary">Penelitian Dosen Pemula</b>                              </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>

                      <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusJurnal{{$data->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data artikel jurnal ini? <span> {{$data->judul}}</span> </h4>
                        </div>
                            <div class="modal-footer">
                                <form action="/journals/{{$data->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary">Hapus Data artikel jurnal!</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

                        <!-- Modal edit -->
    <div class="modal" id="modalUpdateJurnal{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Artikel Prosiding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method ="post" action ="/journals/{{ $data->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="judul">Judul Jurnal</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Jurnal" name="judul" value="{{$data->judul}}">
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_jurnal">Nama jurnal</label>
                            <input type="text" class="form-control " id="nama_jurnal" placeholder="Nama Jurnal" name="nama_jurnal" value="{{$data->nama_jurnal}}">
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn" value="{{$data->nidn}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" class="form-control" id="nomor" placeholder="Nomor" name="nomor" maxlength="3" value="{{$data->nomor}}">   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="issn">ISSN</label>
                            <input type="text" class="form-control" id="issn" placeholder="issn" name="issn" maxlength="15" value="{{$data->issn}}">  
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_publikasi">Jenis Publikasi </label>
                            <input type="text" class="form-control" id="jenis_publikasi" placeholder="Jenis Publikasi" name="jenis_publikasi" value="{{$data->jenis_publikasi}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peran_penulis">Peran penulis</label>
                            <input type="text" class="form-control" id="peran_penulis" placeholder="Peran penulis" name="peran_penulis" value="{{$data->peran_penulis}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun" value="{{$data->tahun}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="volume">Volume</label>
                            <input type="text" class="form-control" id="volume" placeholder="Volume" name="volume" maxlength="15" value="{{$data->volume}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" placeholder="URL" name="url" value="{{$data->url}}">
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type ="submit" class="btn btn-primary popover-test"> Simpan Data </button>
        </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\
        </div>
    </div>
</div>
</div>
<!-- end edit modal -->


                @endforeach
                @else
                <center><b>Belum Ada Data Artikel Jurnal</b></center>
                @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection