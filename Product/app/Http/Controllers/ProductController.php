<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::all();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        return response()->json($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ Product $Product
     * @return \Illuminate\Http\Response
     */
    public function show($nama)
    {
        //

        $data = Product::where('nama',$nama)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ Product $Product
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
     * @param  \App\Models\ Product $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        return response()->json("Ini update dari Product Microservice EAI");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ Product $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        return response()->json("ini delete dari Prodcut Microservice IAE");
    }
}
