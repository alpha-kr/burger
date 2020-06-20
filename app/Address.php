<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='direccion';
    protected $fillable=['direccion','barrio','telefono','celular'];
}
