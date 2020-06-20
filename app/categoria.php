<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table='categorias';
    public function Products()
    {
        return $this->hasMany('App\producto','id_categorias');
    }
}
