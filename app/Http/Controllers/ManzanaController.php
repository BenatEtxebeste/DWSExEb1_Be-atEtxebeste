<?php

namespace App\Http\Controllers;

use App\Models\Manzana;
use Illuminate\Http\Request;

class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manzanas = Manzana::all();
        return view('manzanas')->with('manzanas', $manzanas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insertarManzana');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Manzana::create([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzana $manzana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manzana $manzana)
    {
        return view('modificarManzana', compact('manzana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manzana $manzana)
    {
        $manzana->update([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
        ]);

        return redirect()->route('biblioteca');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manzana $manzana)
    {
        $manzana->delete();

        return redirect()->route('manzanas');
    }
}
