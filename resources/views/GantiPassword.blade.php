@extends('layout/main')
@section('container')
<div class="card-header bg-secondary" >
    <div class="row">
        <div class="col-md-12">
            <h6 style="font-weight: bold;">Ganti Password </h6>
        </div>
    </div>
</div>                    
    <div class="card-body">
        <div class="col-md-12">
        @foreach($users as $data)
        <form method ="post" action ="/simpanpassword/{{$data->id }}">
            @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" value="{{$data->name}}" readonly>
                    </div>
                </div>
        <div class="col">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" value="{{$data->email}}"  readonly>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="{{$data->username}}"  readonly>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="pass">Masukkan Password Lama</label>
                <input type="text" class="form-control" id="pass">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="password">Masukkan Password Baru </label>
                <input type="text" class="form-control" id="passord" name="password">
            </div>
        </div>
<button type ="submit" class="btn btn-primary popover-test"> Ganti </button>
</form>
@endforeach
        </div>
    </div>
</div>


@endsection