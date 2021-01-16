@extends('layout/main2')
@section('container')
<div class="card">
    <div class="card-header bg-secondary" >
        <div class="row">
            <div class="col-md-12">
                <h6 style="font-weight: bold;">Reset Password </h6>
            </div>
        </div>
    </div>                    
    <div class="card-body">
        <div class="col-md-12">
        <table width="100%" >
        @foreach($users as $data)
        <tr>
            <td><b>Nama</b></td>
            <td>:</td>
            <td>{{$data->name}}</td>
           
            <td></td>
        </tr>
        <tr>
            <td><b>Username</b></td>
            <td>:</td>
            <td>{{$data->username}}</td>
            <td></td>
        </tr>
        <tr>
            <td><b>E-mail</b></td>
            <td>:</td>
            <td>{{$data->email}}</td>
            <td></td>
        </tr>
        <tr>
            <td><b>Level</b></td>
            <td>:</td>
            <td>{{$data->level}}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><center><button class="btn btn-danger" data-toggle="modal" data-target="#modalReset{{ $data->id }}"> Reset Password</button></center></td>
        </tr>
        <tr>
            <td colspan="4"><hr></td>
        </tr>

         <!-- modal  -->
         <div class="modal fade" id="modalReset{{$data->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                                <form action="/simpanReset/{{$data->id}}" method="post">
                                @csrf
                        <h4 class="text-center">Apakah anda yakin menghapus me-reset password user ini?<br> <span> {{$data->name}}</span><br>
                        <input type="text" class="col-4" name="password" value="{{$data->username}}" readonly hidden>
                         </h4>

                        </div>
                                <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end modal  -->


        @endforeach
        </table>
        </div>
    </div>
</div>


@endsection