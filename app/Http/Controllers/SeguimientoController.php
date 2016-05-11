<?php

namespace App\Http\Controllers;

use App\Model\Actividad;
use App\Model\Estudiante;
use App\Model\Seguimiento;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Response;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimientos = Seguimiento::all();

        $estudiantes = Estudiante::all();
        $actividades = Actividad::all();

        return view('seguimientos.index',compact('seguimientos','estudiantes','actividades'));
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
        $seguimiento =new Seguimiento();

        $seguimiento->estudiantes_id=$request->estudiante;
        $seguimiento->actividades_id=$request->actividad;

        $seguimiento->save();

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguimiento = Seguimiento::findOrFail($id);

        return Response::json($seguimiento);
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
        $seguimiento = Seguimiento::findOrFail($id);
        $seguimiento->estudiantes_id = $request->estudiante;
        $seguimiento->actividades_id = $request->actividad;

        $seguimiento->save();

        return Response::json('ok',200);

//        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seguimiento::destroy($id);

        return Response::json('ok',200);
    }
}
