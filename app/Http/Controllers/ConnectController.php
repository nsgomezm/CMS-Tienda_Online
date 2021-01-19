<?php

namespace App\Http\Controllers;

use App\Mail\UserSendRecoverPassword;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

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

    public function recover(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        
        $users = User::where('email',  $request->email)->get();
        
        
        if(!count($users)){ return back()->with('message', 'El correo no se encuentra registrado')->with('typealert', 'warning'); }   
        $user = $users[0];
        $url =  URL::temporarySignedRoute('restore', now()->addMinutes(5), ['user' => $user ] );

        Mail::to($user->email)->send(new UserSendRecoverPassword(['user' => $user, 'url' => $url]));

        return redirect()->route('reset')->withInput()->with('legend', 'El enlace solo funcionara durante cinco (5) minutos.')->with('message', 'Tu información a sido verificada y hemos enviado un mensaje a tu correo para poder resetear nuevamente tu contraseña.');
    }

    public function restore(\App\Models\User $user, Request $request){
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $password = time();
        $user->password = $password;
        $user->password_code = $password;
        $user->save();
        return redirect()->route('reset')->withInput()->with('legend', 'Guarda bien este codigo. No se volvera a mostrar')->with('message', "Tu nueva contraseña es la siguiente: $password");
    }
}
