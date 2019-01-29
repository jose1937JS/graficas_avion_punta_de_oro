<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$supplier = Supplier::all();

		dd($supplier);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$supplier = new Supplier();

		$supplier->name    = $req->input('name');
		$supplier->address = $req->input('address');
		$supplier->email   = $req->input('email');
		$supplier->phone   = $req->input('phone');
		$supplier->rif     = $req->input('rif');

		$supplier->save();
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
		$supplier = Supplier::find($id);

		$supplier->name    = $req->input('name');
		$supplier->address = $req->input('address');
		$supplier->email   = $req->input('email');
		$supplier->phone   = $req->input('phone');
		$supplier->rif     = $req->input('rif');

		$supplier->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$supplier = Supplier::find($id);

		$supplier->delete();
	}
}
