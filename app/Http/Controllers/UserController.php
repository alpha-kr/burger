<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\pedido;
use App\User;
use App\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
          $user=User::find(Auth::id());
        return view('burger.userdata')->with('pedidos',$user->pedidos);
    }
    public function update(Request $request)
    {
        $user = Auth::user();

            $val=Validator::make( $request->input(),['name'=>'String |required| ','email'=>'required|email|', 'password'=>'required']);
            if ($val->fails()) {
                return  Redirect::back() ->withErrors($val);
            }else{
                $user->email=$request->input('email');
                $user->name=$request->input('name');
                $user->password = bcrypt($request->input('password'));
                $user->save();
                $request->session()->flash('exito', "hola");
                return back();
            }


    }
    public function addAddress(Request $request)
    {

    }
}
