<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Sale;
use App\Supplier;

use Carbon\Carbon;

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

    public function weekly_sales(Request $request)
    {
        $data = [];
        $categories = Category::all();

        $datefrom = Carbon::now();
        $dateto = Carbon::now()->addWeek();

        $datefrom = $datefrom->format('Y-m-d');
        $dateto = $dateto->format('Y-m-d');
        
        $sales = Sale::whereBetween('created_at', array($datefrom, $dateto))->get();

        foreach ($categories as $key => $category) {
            $query = Sale::whereHas('product', function ($query) use($category) {
                $query->where('category_id', $category->id);
            })->get();

            $data[$key] = [
                'name' => $category->category,
                'data' => $query
            ];
        }

        return response()->json($data);
    }
}
