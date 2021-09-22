<?php

namespace App\Http\Controllers;

use App\Models\Hexagram;
use Illuminate\Http\Request;

class HexagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'hexagrams' => Hexagram::get()
        ], 200);
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
     * @param  \App\Models\Hexagram  $hexagram
     * @return \Illuminate\Http\Response
     */
    public function show(Hexagram $hexagram)
    {
        return response()->json([
            'hexagram'  => $hexagram
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hexagram  $hexagram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hexagram $hexagram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hexagram  $hexagram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hexagram $hexagram)
    {
        //
    }
}
