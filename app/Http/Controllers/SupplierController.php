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
		$proveedores = Supplier::all();

		return view('user.proveedores', compact('proveedores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('user.addproveedor');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $req)
	{
		$supplier = new Supplier();

		$supplier->name    = $req->input('name');
		$supplier->address = $req->input('address');
		$supplier->email   = $req->input('email');
		$supplier->phone   = $req->input('phone');
		$supplier->rif     = $req->input('rif');

		$supplier->save();

		\Session::flash('message', 'Proveedor registrado con exito');

		return redirect()->route('proveedores.index');

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
		$proveedor = Supplier::findOrFail($id);

		return view('user.editproveedores', compact('proveedor'));
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
		$supplier = Supplier::find($id);

		$supplier->name    = $req->input('name');
		$supplier->address = $req->input('address');
		$supplier->email   = $req->input('email');
		$supplier->phone   = $req->input('phone');
		$supplier->rif     = $req->input('rif');

		$supplier->save();


		\Session::flash('message', 'Proveedor modificado con exito');

		return redirect()->route('proveedores.index');
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

		\Session::flash('message', 'Proveedor eliminado con exito');

		return redirect()->route('proveedores.index');
	}
}
