<?php

namespace App\Http\Controllers;

use App\Model\Actividad;
use App\Model\Asignatura;
use App\Model\Estudiante;
use App\Model\Nota;
use App\Model\Profesor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Response;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::all();
        $estudiantes = Estudiante::all();
        $asignaturas = Asignatura::all();

        return view('notas.index',compact('notas','estudiantes','asignaturas'));
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
        $nota =new Nota($request->all());

        $nota->estudiantes_id=$request->estudiante;
        $nota->asignaturas_id=$request->asignatura;

        $nota->definitiva=($request->corte1*0.3)+($request->corte2*0.3)+($request->corte3*0.4);

        $nota->save();

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
        $nota = Nota::findOrFail($id);

        return Response::json($nota);
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
        $nota = Nota::findOrFail($id);

        $nota->corte1 = $request->corte1;
        $nota->corte2 = $request->corte2;
        $nota->corte3 = $request->corte3;

        $nota->estudiantes_id=$request->estudiante;
        $nota->asignaturas_id=$request->asignatura;

        $nota->definitiva=($request->corte1*0.3)+($request->corte2*0.3)+($request->corte3*0.4);

        $nota->save();

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
        Nota::destroy($id);

        return Response::json('ok',200);
    }
}
