<?php

namespace App\Http\Controllers;
use App\categoria;
use App\producto;
use App\shoppingCart;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {

        $categoria=null;
        $productos=null;
        if (!empty($id) && !empty ($categoria=categoria::find($id))) {
            $productos=$categoria->products;

            return view('home')->with('products',$productos)
                               ->with('id',$id);
        }else{

            $productos=producto::all();
            return view('home')->with('products',$productos)
                               ->with('id',$id);
        }

    }
    public function close()
    {
        Auth::logout();

        return redirect('/');
    }
    public function add(Request $request)
  {

    /* if (Auth::check()) {

        $cart=shoppingCart::where(['id_user'=>Auth::id(),'end'=>false])->get();
        if (!empty($cart)) {
            Cart::add( $cart->identifier,
                $request->input('id'),
                $request->input('nombre'),
                intval( $request->input('cantidad')),
                floatval($request->input('valor')),
                ['img'=>$request->input('img')]
                );
            $cart->content= serialize( Cart::content());
            $cart->save();

        }else{

        }
    }else{
        Cart::add(
            $request->input('id'),
            $request->input('nombre'),
            intval( $request->input('cantidad')),
            floatval($request->input('valor')),
            ['img'=>$request->input('img')]
            );
    } */

    Cart::add(
        $request->input('id'),
        $request->input('nombre'),
        intval( $request->input('cantidad')),
        floatval($request->input('valor')),
        ['img'=>$request->input('img')]
        );
        $request->session()->flash('exito', "hola");
    return  redirect('home');



  }

}
