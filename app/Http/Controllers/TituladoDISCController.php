<?php

namespace App\Http\Controllers;

use App\TituladoDISC;
use Illuminate\Http\Request;
class TituladoDISCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexTitulados = TituladoDISC::orderBy('id')->get();
        return view('indexTitulados',['actividad_titulados'=>$indexTitulados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registroTitulado');////
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $request->validate([
            'nombre' =>  'required|regex:/^[\pL\s\-]+$/u',
            'rut' => 'required|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/',
            'telefono' => 'regex:/^(\+?56)?(\s?)(0?9)(\s?)[98765]\d{7}$/',
            'email' => 'email',
            'empresa'=> 'regex:/^[\pL\s\-]+$/u',
            'titulacion_year' => 'required|numeric:4',
            'carrera' => 'required',

        ]);

        TituladoDISC::create([
            'nombre' => $data['nombre'],
            'rut' => $data['rut'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'empresa' => $data['empresa'],
            'titulacion_year' => $data['titulacion_year'],
            'carrera' => $data['carrera'],
        ]);

        return view('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TituladoDISC  $tituladoDISC
     * @return \Illuminate\Http\Response
     */
    public function show(TituladoDISC $tituladoDISC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TituladoDISC  $tituladoDISC
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registroTitulado= TituladoDISC::findOrFail($id);
        $nombre=$registroTitulado->nombre;
        $rut=$registroTitulado->rut;
        $telefono=$registroTitulado->telefono;
        $email=$registroTitulado->email;
        $empresa=$registroTitulado->empresa;
        $titulacion_year=$registroTitulado->titulacion_year;
        $carrera=$registroTitulado->carrera;

        return view('edicionTitulados',compact("registroTitulado", 'nombre',
            'rut', 'telefono','email','empresa','titulacion_year','carrera'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TituladoDISC  $tituladoDISC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TituladoDISC $tituladoDISC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TituladoDISC  $tituladoDISC
     * @return \Illuminate\Http\Response
     */
    public function destroy(TituladoDISC $tituladoDISC)
    {
        //
    }
}
