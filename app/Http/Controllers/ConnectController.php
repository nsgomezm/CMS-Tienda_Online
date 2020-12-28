<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectController extends Controller
{
    public function login(Request $request){
        $validate = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        
        $validator = Validator::make($request->all(), $validate);
        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'error');
        }

        $credentials = $request->only('email', 'password'); 
        if(Auth::attempt($credentials, true)){
            return redirect()->intended();
        }else{
            return back()->withErrors($validator)->with('message', 'Correo o contraseña incorrecta')->with('typealert', 'warning');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended();
    }

    public function register(Request $request){
        $validate = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ];
        
        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        } 

        $user = new User($request->all());
        $user->save();
        return redirect()->intended( route('login') )->with('message', 'Se a creado el usuario correctamente')->with('typealert', 'success');
    }
}
