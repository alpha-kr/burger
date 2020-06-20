<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\pedido;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
          $user=User::find(Auth::id());



        return view('burger.userdata')->with('pedidos',$user->pedidos);
    }
}
