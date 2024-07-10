<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //* Campos a llenarse en la tabla
    protected $fillable = ['estatus', 'nombre', 'telefonos', 'correo', 'fecha_eliminado'];
}
