<?php

namespace App\Http\Controllers;

use App\Http\Resources\HexagramResource;
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
            'hexagrams' => HexagramResource::collection(Hexagram::all())
        ], 200);
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
            'hexagram'  =>new HexagramResource($hexagram)
        ], 200);
    }

    /**
     * Find the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find($code)
    {
        $hexagram = Hexagram::where('code', $code)->first();
        return response()->json([
            'hexagram'  =>new HexagramResource($hexagram)
        ], 200);
    }
}
