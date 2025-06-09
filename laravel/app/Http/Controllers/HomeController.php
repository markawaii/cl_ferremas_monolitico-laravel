<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $productos = collect([
            (object)[
                'id' => 1,
                'nombre' => 'Audífonos Bluetooth',
                'precio' => 29990,
                'stock' => 50,
                'sku' => 'SP123',
                'marca' => 'SoundPro',
                'imagen' => null,
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Teclado Mecánico',
                'precio' => 49990,
                'stock' => 20,
                'sku' => 'TK456',
                'marca' => 'TecnoKey',
                'imagen' => null,
            ],
            (object)[
                'id' => 3,
                'nombre' => 'Mouse Gamer RGB',
                'precio' => 19990,
                'stock' => 35,
                'sku' => 'HC789',
                'marca' => 'HyperClick',
                'imagen' => null,
            ],
            (object)[
                'id' => 4,
                'nombre' => 'Monitor 24"',
                'precio' => 129990,
                'stock' => 10,
                'sku' => 'MN101',
                'marca' => 'ViewTech',
                'imagen' => null,
            ],
            (object)[
                'id' => 5,
                'nombre' => 'Silla Gamer',
                'precio' => 89990,
                'stock' => 15,
                'sku' => 'SG202',
                'marca' => 'ErgoChair',
                'imagen' => null,
            ],
            (object)[
                'id' => 6,
                'nombre' => 'Laptop 14"',
                'precio' => 499990,
                'stock' => 5,
                'sku' => 'LT303',
                'marca' => 'CompX',
                'imagen' => null,
            ],
            (object)[
                'id' => 7,
                'nombre' => 'Cámara Web HD',
                'precio' => 24990,
                'stock' => 40,
                'sku' => 'CW404',
                'marca' => 'ZoomCam',
                'imagen' => null,
            ],
            (object)[
                'id' => 8,
                'nombre' => 'Disco SSD 512GB',
                'precio' => 69990,
                'stock' => 25,
                'sku' => 'SSD505',
                'marca' => 'UltraDisk',
                'imagen' => null,
            ],
        ]);

        return view('welcome', compact('productos'));
    }
}
