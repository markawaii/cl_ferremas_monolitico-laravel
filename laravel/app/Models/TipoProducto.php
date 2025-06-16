<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoProducto extends Model
{
    use HasFactory;

    protected $table = 'tipo_productos';

    protected $fillable = ['nombre' , 'active'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'type_id');
    }
}
