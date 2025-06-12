<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrecioHistorico extends Model
{
    use HasFactory;

    protected $table = 'precio_historicos';

    protected $fillable = [
        'product_id',
        'price',
        'reason',
    ];

    public function producto() {
        return $this->belongsTo(Producto::class, 'product_id');
    }
}
