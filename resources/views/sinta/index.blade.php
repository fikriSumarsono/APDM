@extends('layout/main');
@section('tab')

<div class="card-header p-2">
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link" href="{{url('/')}}"  >IDENTITAS</a></li>
                  <li class="nav-item"><a class="nav-link active" href="{{url('/sinta')}}" >SINTA</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/researchs')}}" >PENELITIAN</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/pengabdians')}}" >PENGABDIAN</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/journals')}}" >ARTIKEL JURNAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/haks')}}" >HKI</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/prosidings')}}">ARTIKEL PROSIDING</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/books') }}" >BUKU</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('/creations') }}" >KARYA MONUMENTAL</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('/academiks')}}" data-toggle="tab">NASKAH AKADEMIK/URGENSI</a></li>
                </ul>
              </div>
@endsection

@section('container')
<div class="card-body">
    <div class="tab-pane" id="sinta">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h6 style="font-weight: bold;">SINTA</h6>
                    </div>
                    <div class="col-md-9" align="right">
                        <a href="#" type="button" class="btn btn-sm btn-primary" >SINKRONISASI</a>                          </div>
                    </div>                     
                </div>
                    <div class="card-body">
                        <div class="col-md-4">
                          <table style="width: 100%;">
                            <tr>
                              <td>
                                <b>Sinta ID</b>                              </td>
                              <td>:</td>
                              <td>6081479</td>
                            </tr>
                            <tr>
                              <td>
                                <b>Sinta Skor</b>                              </td>
                              <td>:</td>
                              <td>0.34</td>
                            </tr>
                          </table>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <span class="badge badge-info" style="font-size: 14px;">Scopus</span>                            </div>
                            <div class="col-md-6">
                              <span class="badge badge-info" style="font-size: 14px;">Google  Scholar</span>                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <table border="0" style="width: 100%;">
                                <tr>
                                  <td>
                                    <b>Scopus ID</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>H-Index</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>Articles</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>Citation</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                              </table>
                            </div>
                            <div class="col-md-6">
                              <table border="0" style="width: 100%;">
                                <tr>
                                  <td>
                                    <b>Scopus ID</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>H-Index</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>Articles</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>Citation</b>                                  </td>
                                  <td>:</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>
                                    <b>Google I10</b>                                  </td>
                                  <td>:</td>
                                  <td>1</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection