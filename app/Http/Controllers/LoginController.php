<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Lektor;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Postlogin(Request $request){
        if(auth::attempt($request->only('email','password','username'))){
            
            return redirect('Dosen');
        }
        return redirect('/')->with('toast_error','password dan username salah');
    }

    public function logout(Request $request){
        auth::logout();
        return redirect('/');
    }

    public function simpanregistrasi (Request $request){
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'username'=>$request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/lektors');
    }

    public function gantiPassword(){
        $users = User::where('username','=',auth()->user()->username)->get();
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        return view('GantiPassword',['lektors'=>$lektors],['users'=>$users]);
    }
    public function simpanpassword(Request $request, User $user){
        User::where('id', $user->id)
        ->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('/gantiPassword');
    }
    
    public function resetPassword(){
        $lektors = Lektor::where('nama','=',auth()->user()->name)->get();
        $users = User::all();
        return view('ResetPassword',['users'=>$users],['lektors'=>$lektors]);
    }

    public function passwordReset(Request $request, User $user){
        User::where('id', $user->id)
        ->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('/ResetPassword');
    }

}
