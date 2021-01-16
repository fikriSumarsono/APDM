@extends('layout/main')

@section('title')

@section('tab')

<div class="card-header p-2">
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link active" href="{{url('/')}}"  >IDENTITAS</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/sinta')}}">SINTA</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}">ARTIKEL PROSIDING</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/books') }}" >BUKU</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" >NASKAH AKADEMIK/URGENSI</a></li>
                </ul>
              </div>


@endsection

@section('container')

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="identitas">
                    <div class="card">
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-3">
                            <h6 style="font-weight: bold;">IDENTITAS</h6>
                          </div>
                      @foreach($lektors as $data)
                          <div class="col-md-9" align="right">
                            <a href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalUpdateLektor{{$data->id}}"><i class="nav-icon fas fa-edit"></i></a>                          </div>
                        </div>                        
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="card-body box-profile">
                              @if($data->foto)
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('img/'.$data->foto)}}" alt="User profile picture">                              </div>
                              @else
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user2-160x160.jpg')}}" alt="User profile picture">                              </div>
                              @endif
                            </div>
                            <h3 class="profile-username text-center">{{$data->nama}}</h3>
                            <p class="text-muted text-center">{{$data->skill}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>NIDN/NIDK</b> <a class="float-right">{{$data->nidn}}</a>                              </li>
                            </ul>
                          </div>
                          <div class="col-md-9">
                            <table class="table">
                              <tr>
                                <th>Institusi</th>
                                <td>{{$data->institusi}}</td>
                                <th>Tempat/Tanggal Lahir</th>
                                <td>{{$data->tanggal_lahir}}</td>
                              <th>                              </tr>
                              <tr>
                                <th>Program Studi</th>
                                <td>{{$data->program_studi}}</td>
                                <th>Nomor KTP</th>
                                <td>{{$data->no_ktp}}</td>
                              </tr>
                             
                              <tr>
                                <th>Jenjang Pendidikan</th>
                                <td>{{$data->pendidikan}}</td>
                                <th>Nomor Telepon</th>
                                <td>{{$data->no_hp}}</td>
                              </tr>
                              <tr>
                                <th>Jabatan Akademik</th>
                                <td>{{$data->jabatan}}</td>
                                <th>Nomor HP</th>
                                <td>{{$data->no_hp}}</td>
                              </tr>
                              <tr>
                                <th>Alamat</th>
                                <td>{{$data->alamat}}</td>
                                <th>Alamat Surei</th>
                                <td>{{$data->email}}</td>
                              </tr>

                               <!-- Modal edit -->
    <div class="modal" id="modalUpdateLektor{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Identitas</h5>
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
                            <label for="pendidikan">Jenjang Pendidikan</label>
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
                            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat">{{$data->alamat}}</textarea>
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



                              @endforeach
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

    