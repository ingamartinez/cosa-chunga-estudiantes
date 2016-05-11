<?php

namespace App\Http\Controllers;

use App\Model\Actividad;
use App\Model\Estudiante;
use App\Model\Asignatura;
use App\Model\Profesor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Response;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();

        $profesores = Profesor::all();

        return view('asignaturas.index',compact('asignaturas','profesores'));
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
        $asignatura =new Asignatura($request->all());

        $asignatura->profesores_id=$request->profesor;

        $asignatura->save();

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
        $asignatura = Asignatura::findOrFail($id);

        return Response::json($asignatura);
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
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->nombre = $request->nombre;
        $asignatura->semestre_asignatura = $request->semestre_asignatura;
        $asignatura->profesores_id = $request->profesor;


        $asignatura->save();

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
        Asignatura::destroy($id);

        return Response::json('ok',200);
    }
}
