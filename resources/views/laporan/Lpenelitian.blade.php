@extends('layout/main4')



@section('container')
<div class="card">
    <div class="card-header bg-secondary">
        <div class="row">
            <div class="col-md-3">
                <h3 class="card-title">Data Penelitian</h3>
            </div>
        </div>  
    </div>
    <!-- /.card-header -->
    <div class="card-body" >
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th >#</th>
                    <th>NIDN</th>
                    <th>Judul Penelitian</th>
                    <th>Peran</th>
                    <th>Tahun</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
            @foreach($researchs as $data)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{$data->nidn}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->peran}}</td>
                    <td>{{$data->tahun}}</td>
                    @if($data->approve)
                    <td>{{$data->approve}}</td>
                    @else
                    <td>Belum dikonfirmasi</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    
</div>
<!-- /.card -->



@endsection
