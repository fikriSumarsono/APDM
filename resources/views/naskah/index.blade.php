@extends('layout/main')


@section('tab')
<div class="card-header p-2">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="{{url('/Dosen')}}"  >IDENTITAS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}" >SINTA</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}" >ARTIKEL PROSIDING</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/books') }}">BUKU</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
    </ul>
</div>
@endsection

@section('container')
<div class="card-body">
    <div class="tab-pane" id="naskah">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h6 style="font-weight: bold;">DATA NASKAH AKADEMIK</h6>
                    </div>
                    <div class="col-md-9" align="right">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="nav-icon fas fa-edit"></i>Data Baru</button>                           </div>
                </div>                     
            </div>

            <!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Naskah Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/academiks" enctype="multipart/form-data">
                @csrf
                <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="judul">Judul Naskah</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Naskah" name="judul" >
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis">Jenis Naskah</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis Naskah" name="jenis" >
                            @error('jenis')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="peruntukan">Peruntukan</label>
                            <input type="text" class="form-control" id="peruntukan" placeholder="Peruntukan" name="peruntukan" maxlength="15" > 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peran">Peran</label>
                            <input type="text" class="form-control" id="peran" placeholder="Peran" name="peran" maxlength="15" >           
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="penyerahan">Penyerahan</label>
                            <input type="text" class="form-control" id="penyerahan" placeholder="Penyerahan" name="penyerahan" maxlength="5" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun </label>
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pejabat_penerima">Pejabat Penerima</label>
                            <input type="text" class="form-control" id="pejabat_penerima" placeholder="Pejabat Penerima" name="pejabat_penerima" maxlength="3" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn" value="{{auth()->user()->username}}" readonly>
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
                    @if(count($academiks)>=1) 
                    @foreach($academiks as $data)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{$data->judul}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>                              </td>
                        <td>{{$data->jenis}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <b>Peruntukan :  </b>
                        {{$data->nomor}} |
                        <b>Peran : </b>
                        {{$data->isbn_issn}} |
                        <b>Penyerahan : </b>
                        {{$data->volume}}                              </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <b>Tahun : </b>
                            {{$data->tahun}} |
                        <b>Pejabat Penerima : </b>
                            {{$data->peran_penulis}} |
                        <b>NIDN : </b>
                            {{$data->jenis_prosiding}}                              </td>
                        <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateNaskah{{$data->id}}">Update</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusNaskah{{$data->id}}">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <a href="{{ $data -> url }}">{{ $data -> url }}</a>                             </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="file/naskah/{{$data->upload}}" download="{{$data->upload}}">{{ $data -> upload }}</a> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>

                    <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusNaskah{{$data->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data naskah akademik ini? <span> {{$data->judul}}</span> </h4>
                        </div>
                            <div class="modal-footer">
                                <form action="/academiks/{{$data->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary">Hapus Data Naskah Akademik!</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

                <!-- Modal edit -->
    <div class="modal" id="modalUpdateNaskah{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Artikel Prosiding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method ="post" action ="/academiks/{{ $data->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class = "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="judul">Judul Naskah</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Prosiding" name="judul" value="{{$data->judul}}">
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis">Jenis Naskah</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis Naskah" name="jenis" value="{{$data->jenis}}">
                            @error('jenis')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="peruntukan">Peruntukan</label>
                            <input type="text" class="form-control" id="peruntukan" placeholder="Peruntukan" name="peruntukan" maxlength="15" value="{{$data->peruntukan}}"> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="peran">Peran</label>
                            <input type="text" class="form-control" id="peran" placeholder="Peran" name="peran" maxlength="15" value="{{$data->peran}}">           
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="penyerahan">Penyerahan</label>
                            <input type="text" class="form-control" id="penyerahan" placeholder="Penyerahan" name="penyerahan" maxlength="5" value="{{$data->penyerahan}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun </label>
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun" name="tahun" value="{{$data->tahun}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pejabat_penerima">Pejabat Penerima</label>
                            <input type="text" class="form-control" id="pejabat_penerima" placeholder="Pejabat Penerima" name="pejabat_penerima" maxlength="3" value="{{$data->pejabat_penerima}}">
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
                    <center><b>Belum Ada Data Naskah Akademik</b></center>
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection