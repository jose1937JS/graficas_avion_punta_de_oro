<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;


class SaleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$sales = Sale::all();

		return view('user.ventas', compact('sales'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$products = Product::all();

		return view('user.addventa', compact('products'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $req)
	{
		$sale = new Sale();

		$sale->quantity    = $req->input('quantity');
		$sale->total_price = $req->input('total_price');
		$sale->product_id  = $req->input('product_id');

		$sale->save();

		\Session::flash('message', 'Venta registrada con exito');

		return redirect()->route('ventas.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	public function reportePdf()
	{
		$sales = Sale::all(); 

        $pdf = PDF::loadView('reports.sales', compact('sales'));

        return $pdf->download('listado_ventas.pdf');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$sale = Sale::findorFail($id);
		$products = Product::all();

		return view('user.editventa', compact('sale', 'products'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $req, $id)
	{
		$sale = Sale::find($id);

		$sale->quantity    = $req->input('quantity');
		$sale->total_price = $req->input('total_price');
		$sale->product_id  = $req->input('product_id');

		$sale->save();

		\Session::flash('message', 'Venta modificada con exito');

		return redirect()->route('ventas.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$sale = Sale::find($id);

		$sale->delete();

		\Session::flash('message', 'Venta eliminada con exito');

		return redirect()->route('ventas.index');
	}
}
