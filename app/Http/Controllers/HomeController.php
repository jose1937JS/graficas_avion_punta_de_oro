<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Sale;
use App\Supplier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products  = Product::all();
        $suppliers = Supplier::all();
        $sales     = Sale::all();
        $earnings  = [18];

        return view('user.dashboard')
                ->with('productos', $products)
                ->with('proveedores', $suppliers)
                ->with('ventas', $sales)
                ->with('ganancias', $earnings);
    }
}
