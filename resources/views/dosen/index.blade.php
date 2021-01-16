@extends('layout/main2')



@section('container')
<div class="card">
    <div class="card-header bg-secondary">
        <div class="row">
            <div class="col-md-3">
                <h3 class="card-title">Data Dosen</h3>
            </div>
            <div class="col-md-9" align="right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                <i class="nav-icon fas fa-edit"></i>Data Baru</button>                        
            </div>
        </div>  
    </div>

    <!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method ="post" action ="/lektors"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" placeholder="NIDN" name="nidn" maxlength="10" required>
                            @error('nidn')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" placeholder="No KTP" name="no_ktp" maxlength="16" required>
                            @error('no_ktp')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="No Hp" name="no_hp" maxlength="13">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" placeholder="E-mail" name="email">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="institusi">Institusi</label>
                            <input type="text" class="form-control" id="institusi" placeholder="Institusi" name="institusi">
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="jabatan">
                          <option selected>Pilih Jabatan</option>
                          <option>Dosen</option>
                          <option>Dosen dan LPPM</option>
                          <option>Dosen dan Ketua Prodi</option>
                          <option>Dosen dan Penjamin Mutu</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="program_studi">Program Studi</label>
                            <input type="text" class="form-control" id="program_studi" placeholder="Program Studi" name="program_studi">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikan" placeholder="Pendidikan" name="pendidikan">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="text" class="form-control" id="skill" placeholder="Skill" name="skill">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat"></textarea>
                        </div>
                    </div>
                </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
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
    
    <!-- /.card-header -->
    <div class="card-body" >
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th >#</th>
                    <th>Foto </th>
                    <th>NIDN</th>
                    <th>No Ktp</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Skill</th>
                    <th>Institusi</th>
                    <th>Jabatan</th>
                    <th>Program Studi</th>
                    <th>Pendidikan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lek as $data)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    @if($data->foto)
                    <td><img src="img/{{$data->foto}}" class="img-circle elevation-3" width="150" heigth="150"> </td>
                    @else
                    <td><img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"></td>
                    @endif
                    <td>{{$data->nidn}}</td>
                    <td>{{$data->no_ktp}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->tanggal_lahir}}</td>
                    <td>{{$data->no_hp}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->skill}}</td>
                    <td >{{$data->institusi}}</td>
                    <td >{{$data->jabatan}}</td>
                    <td >{{$data->program_studi}}</td>
                    <td >{{$data->pendidikan}}</td>
                    <td >{{$data->alamat}}</td>
                    <td >
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateLektor{{$data->id}}">Update</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusLektor{{$data->id}}">Delete</button>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalBuatAkun{{$data->id}}">Buat Akun</button>
                    </td>
                </tr>

                <!-- modal hapus data -->
            <div class="modal fade" id="modalHapusLektor{{$data->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus data dosen ini? <span> {{$data->nama}}</span> </h4>
                        </div>
                            <div class="modal-footer">
                                <form action="/lektors/{{$data->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary">Hapus Data Dosen!</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus -->

            <!-- Modal edit -->
    <div class="modal" id="modalUpdateLektor{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form method ="post" action ="/lektors/{{ $data->id }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" placeholder="NIDN" name="nidn" maxlength="10" value="{{$data->nidn}}" required>
                            @error('nidn')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" placeholder="No KTP" name="no_ktp" maxlength="16" value="{{$data->no_ktp}}" required>
                            @error('no_ktp')<div class="invalid-feedback">{{ $message }} </div>@enderror
                        </div>
                    </div>
                    </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{$data->nama}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" placeholder="URL" name="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="No Hp" name="no_hp" maxlength="13" value="{{$data->no_hp}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" placeholder="E-mail" name="email" value="{{$data->email}}">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="institusi">Institusi</label>
                            <input type="text" class="form-control" id="institusi" placeholder="Institusi" name="institusi" value="{{$data->institusi}}">
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan">
                        <option value="{{$data->jabatan}}">{{$data->jabatan}}</option>
                          <option>Dosen</option>
                          <option>Dosen dan LPPM</option>
                          <option>Dosen dan Ketua Prodi</option>
                          <option>Dosen dan Penjamin Mutu</option>

                          
                        </select>
                      </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="program_studi">Program Studi</label>
                            <input type="text" class="form-control" id="program_studi" placeholder="Program Studi" name="program_studi" value="{{$data->program_studi}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikan" placeholder="Pendidikan" name="pendidikan" value="{{$data->pendidikan}}">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="text" class="form-control" id="skill" placeholder="Skill" name="skill" value="{{$data->skill}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" >{{$data->alamat}}</textarea>
                        </div>
                    </div>
                </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <img src="{{asset('img/'.$data->foto)}}" width="200px" heigth="200px"><br>
                            <input type="text" class="form-control" name="file" value="{{$data->foto}}">
                        </div>
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

<!-- modal buat akun -->
<div class="modal" id="modalBuatAkun{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="modal-body">
            <form method ="post" action ="{{ Route('simpanregistrasi') }}">
            @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data->nama}}">
                    </div>
                </div>
        <div class="col">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$data->nidn}}" readonly>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" class="form-control" id="level" name="level" value="{{$data->jabatan}}"> readonly
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{$data->nidn}}">
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
<!-- end modal -->

            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    
</div>
<!-- /.card -->



@endsection
