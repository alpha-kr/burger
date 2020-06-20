<?php

namespace App\Http\Controllers;
use App\pedido;
use App\shoppingCart;
use Illuminate\Http\Request;
 use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
  public function show()
  {
      return view('burger.cart')->with('cart',Cart::content())
                                ->with('subtotal',Cart::subtotal())
                                ->with('tax',Cart::tax())
                                ->with('total',Cart::total());
  }
  public function action(Request $request)
  {


    $item=Cart::get($request->input('rowId'));

    switch ($request->input('action')) {
        case '+':


            Cart::update($item->rowId,$item->qty+1);
            break;

        default:

        Cart::update($item->rowId,$item->qty-1);
        break;
            break;
    }
    return back();
  }
  public function remove(Request $request)
  {

    $item=Cart::get($request->input('rowId'));
    Cart::remove($item->rowId);
    return back();
  }
  public function end(Request $request)
  {
    $now = new \DateTime();
    $timesmap=date_timestamp_get($now);


      if (Cart::count()>0) {
           Cart::store( strval($timesmap));
           $shop=shoppingCart::where('identifier',$timesmap)->update(['id_user'=>\Auth::id(),'end'=>true]);


          $pedido= new pedido(['fecha'=>$now->format('Y-m-d H:i:s'),
                        'domicilio'=>2,
                        'id_direccion'=>null,
                        'total'=>Cart::total(),
                        'subtotal'=>Cart::subtotal(),
                        'descuento'=>0,
                        'cart'=>$timesmap,

                        ]);
            $pedido->save();
            foreach (Cart::content() as $item) {
                $pedido->products()->attach($item->id,['cantidad'=>$item->qty]);
            }


            Cart::destroy();
            $request->session()->flash('exito', "hola");
            return redirect('cart');
      }




  }
}
