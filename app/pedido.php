<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable=['fecha',
    'domicilio',
    'id_direccion',
    'total',
    'subtotal',
    'descuento',
    'cart',
    'id_user'];
    public function products()
    {
        return $this->belongsToMany('App\producto','detalle_pedido','id_pedido','id_producto')->withPivot('cantidad');
    }
    public function address()
    {
        return $this-> hasOne('App\Address','id');
    }
}
