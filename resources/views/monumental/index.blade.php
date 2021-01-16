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
                <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}" >ARTIKEL PROSIDING</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/books') }}" >BUKU</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
                </ul>
</div>


@endsection

@section('container')
<section>
<div class="tab-content">
    <div class="card-body">
        <div class="tab-pane" id="monumental">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h6 style="font-weight: bold;">DATA KARYA MONUMENTAL</h6>
                        </div>
                        <div class="col-md-9" align="right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="nav-icon fas fa-edit"></i>Data Baru</button>                          </div>
                        </div>
                    </div>

                     <!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karya Monumental</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/creations" enctype="multipart/form-data">
                @csrf
                <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Jenis Karya Monumental</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis Karya Monumental" name="jenis">
                            @error('jenis')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control " id="deskripsi" placeholder="Deskripsi" name="deskripsi" >
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <input type="text" class="form-control" id="tingkat" placeholder="Tingkat" name="tingkat" >
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
                        @if(count($creations)>=1)
                        @foreach($creations as $data)
                            <tr>
                                <td>{{$lopp -> iteration}}</td>
                                <td>{{$data->jenis}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>                              </td>
                                <td>{{$data->deskripsi}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <b>Tahun : </b>
                                    {{$data->tahun}} |
                                <b>NIDN : </b>
                                    {{$data->nidn}} |
                                <b>Tingkat : </b>
                                    {{$data->tingkat}}                              </td>
                                <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateMonumental{{$data->id}}">Update</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusMonumental{{$data->id}}">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <a href="{{ $data -> url }}">{{ $data -> url }}</a>                              </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>

                             <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusMonumental{{ $data->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data karya monumental ini? <span>Karya Monumental {{$data->jenis}}</span> </h4>
                        </div>
                            <div class="modal-footer">
                                <form action="/creations/{{$data->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary">Hapus Data Karya Monumental!</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

             <!-- Modal edit -->
    <div class="modal" id="modalUpdateMonumental{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data HKI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method ="post" action ="/creations/{{ $data->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                <div class = "row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis">Jenis Karya Monumental</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis Karya Monumental" name="jenis" value="{{$data->jenis}}">
                            @error('jenis')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control " id="deskripsi" placeholder="Deskripsi" name="deskripsi" value="{{$data->deskripsi}}">
                        </div>
                    </div>
                </div>
                <div class= "row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <input type="text" class="form-control" id="tingkat" placeholder="Tingkat" name="tingkat" value="{{$data->tingkat}}">
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
                            <center><b>Belum Ada Data Karya Monumental</b</center>
                            @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection