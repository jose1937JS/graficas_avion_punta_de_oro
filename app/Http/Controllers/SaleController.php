<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sale;

class SaleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$sale = Sale::all();

		return view('user.ventas');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('user.addventa');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$sale = new Sale();

		$sale->quantity    = $req->input('quantity');
		$sale->total_price = $req->input('total_price');
		$sale->product_id  = $req->input('productid');

		$sale->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$sale = Sale::find($id);

		dd($sale);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$sale = Sale::find($id);

		$sale->quantity    = $req->input('quantity');
		$sale->total_price = $req->input('total_price');
		$sale->product_id  = $req->input('productid');

		$sale->save();
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
	}
}
