@extends('layout/main2')
@section('container')
<div class="row">
          <div class="col-lg-2 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
            
                <h3>  {{$usulan_baru}} </h3>
               
                <p>usulan baru</p>
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
                <h3>0</h3>

                <p>usulan dikirim</p>
              </div>
              
              
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
@endsection

    