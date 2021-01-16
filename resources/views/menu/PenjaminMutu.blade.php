@extends('layout/main4')
@section('container')
<div class="row">
          <div class="col-lg-2 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$usulan_baru}}</h3>

                <p>Usulan Baru</p>
              </div>
              
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$diterima}}</h3>

                <p>usulan diterima</p>
              </div>
              
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-3">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$ditolak}}</h3>

                <p>usulan ditolak</p>
              </div>
              
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$terkirim}}</h3>

                <p>usulan terkirim</p>
              </div>
             
              
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <!-- ./col -->
        </div>
@endsection

    