<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIndicadorRequest;
use App\Http\Requests\DeleteIndicadorRequest;
use App\Http\Requests\EditIndicadorRequest;
use App\Http\Requests\GraficoRequest;
use App\Models\Indicador;
use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateIndicadorRequest $request)
    {
        $indicador = Indicador::create([
            'nombreIndicador' => $request->nombre,
            'codigoIndicador' => $request->codigo,
            'unidadMedidaIndicador' => $request->unidadMedida,
            'valorIndicador' => $request->valor,
            'fechaIndicador' => $request->fecha,
            'origenIndicador' => $request->origen
        ]);

        return response([
            'indicador' => $indicador
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditIndicadorRequest $request)
    {
        $indicador = Indicador::where('id', $request->id)->firstOrFail();

        $indicador->update([
            'nombreIndicador' => $request->nombre,
            'codigoIndicador' => $request->codigo,
            'unidadMedidaIndicador' => $request->unidadMedida,
            'valorIndicador' => $request->valor,
            'fechaIndicador' => $request->fecha,
            'origenIndicador' => $request->origen
        ]);

        return response([
            'indicador' => $indicador
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteIndicadorRequest $request)
    {
        $indicador = Indicador::where('id', $request->id)->firstOrFail();

        $indicador->delete();

        return response([
            'indicador' => $indicador
        ]);
    }

    public function grafico($nombre, $fecha_inicial, $fecha_final)
    {
        $indicadores = Indicador::where('nombreIndicador', $nombre)
            ->whereBetween('fechaIndicador', [$fecha_inicial, $fecha_final])
            ->get();

        return response([
            'indicadores' => $indicadores
        ]);
    }
}
