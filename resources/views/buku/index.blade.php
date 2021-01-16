@extends('layout/main')


@section('tab')
<div class="card-header p-2">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="{{route('Dosen')}}"  >IDENTITAS</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}" >SINTA</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
        <li class="nav-item"><a class="nav-link " href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}">ARTIKEL PROSIDING</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{url('/books') }}" >BUKU</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
    </ul>
</div>


@endsection

@section('container')

    <div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="buku">
    <div class="card card-info card-outline">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <h6 style="font-weight: bold;">DATA BUKU</h6>
                        </div>
                        <div class="col-md-9" align="right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="nav-icon fas fa-edit"></i>Data Baru</button>                        </div>
                            
<!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/books">
                @csrf
                    <div class="col">
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Buku" name="judul" required>
                            @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder="ISBN" name="isbn" maxlength="15" required>
                            @error('isbn')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" placeholder="NIDN" name="nidn" value="{{auth()->user()->username}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="url">Link E-book/URL</label>
                            <input type="text" class="form-control" id="url" placeholder="URL" name="url">
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
</div>                     
</div>

<!--- table --->
<div class="card-body">
    <div class="col-md-12">
        <table style="width: 100%;">
            <tbody>
            @if(count($books) >= 1)
            @foreach ($books as $data)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $data -> judul }}</td>
        </tr>
        <tr>
            <td>                              </td>
            <td>
                <b>ISBN : </b>
                {{ $data->isbn }} |
                <b>NIDN : </b>
                {{ $data->nidn }} |
                                    </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="{{ $data -> url }}" class="text text-primary">{{ $data -> url }}</a>                              </td>
            <td scope="row">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateBuku{{ $data->id }}">Update</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusBuku{{ $data->id }}">Delete</button>
            </td>
        </tr>
        
        
        <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusBuku{{ $data->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data buku ini? <span>Buku {{$data->judul}}</span> </h4>
                        </div>
                            <div class="modal-footer">
                                <form action="/books/{{$data->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary">Hapus Data Buku!</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

<!-- Modal edit -->
    <div class="modal" id="modalUpdateBuku{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <form method ="post" action ="/books/{{ $data->id }}">
            @method('patch')
            @csrf
            
                <div class="col">
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Buku" name="judul" value="{{$data->judul}}">
                        @error('judul')<div class="invalid-feedback">{{ $message }} </div>@enderror
                    </div>
                </div>
        <div class="col">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder="ISBN" name="isbn" value="{{$data->isbn}}">
                @error('isbn')<div class="invalid-feedback">{{ $message }} </div>@enderror
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
                <label for="url">Link E-book/URL</label>
                <input type="text" class="form-control" id="url" placeholder="URL" name="url" value="{{$data->url}}">
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
@endforeach
@else
<b>Tidak Ada Data Buku</b>
@endif
</tbody>
</table>
        </div>
    </div>
</div>
</div>


@endsection
@include('sweetalert::alert')