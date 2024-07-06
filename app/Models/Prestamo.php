<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['estatus', 'id_cliente', 'id_libro', 'fecha_devuelto'];

    //* para mostrar nombre en lugar de id_cliente
    public function Cliente(){
        return $this->hasOne(Cliente::class, 'id', 'id_cliente');
    }
    //* para mostrar titulo en lugar de id_libro
    public function Libro(){
        return $this->hasOne(Libro::class, 'id', 'id_libro');
    }
}
