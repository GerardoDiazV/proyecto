<?php

namespace App\Http\Controllers;

use App\Indicador;
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

        // Todos los indicadores
        $indicadores = Indicador::all();
        $valores = [];
        $años = ['2015','2016','2017','2018','2019'];
        foreach($indicadores as $indicadorKey => $indicador){
            // Para cada año
            foreach($años as $año){
                // Consigue La meta y el Progreso de ese año
                $valorProgreso = '';
                $valorMeta = '';
                $color = 'G';
                foreach($indicador->metas()->get()->where('year',$año) as $key => $meta){
                    $progreso = $indicador->progresos()->get()->where('year',$año)->where('nombre',$meta->nombre)->first();
                    if($progreso['valor_progreso'] < $meta['valor_meta']){
                        $color = 'R';
                    }
                    if((string)$valorProgreso == ''){
                        $valorProgreso = $progreso['valor_progreso'];
                        $valorMeta = $meta['valor_meta'];
                    }else{
                        $valorProgreso = $valorProgreso.'/'.$progreso['valor_progreso'];
                        $valorMeta = $valorMeta.'/'.$meta['valor_meta'];
                    }
                }
                $DiccionarioYears[$año] = [$valorProgreso,$valorMeta,$color];
            }
            $valores[] = $DiccionarioYears;
        }
        return view('consultarIndicadores',['indicadores'=>$indicadores, 'valores'=>$valores,
            'años'=>$años]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicador $indicador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicador $indicador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicador $indicador)
    {
        //
    }
}
