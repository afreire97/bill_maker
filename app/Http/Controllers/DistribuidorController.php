<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Distribuidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar_clientes()
    {


        $user = Auth::user();

        $clientes = null;

        if ($user->is_admin) {
            $clientes = Cliente::all();

        } if ($user->is_distribuidor) {


            $distribuidor = $user->distribuidor;
            $clientes = $distribuidor->clientes;


        }if ($user->is_comercial) {


            $comercial = $user->comercial;
            $clientes = $comercial->clientes;


        }


        return view('distribuidores.lista_clientes', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Distribuidor $distribuidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribuidor $distribuidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribuidor $distribuidor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribuidor $distribuidor)
    {
        //
    }
}
