<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante1;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante1::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;

        $xUpdateAlumnos->save();

        return back()->with('msj', 'Se actualizo con exito!');
    }

    public function fnEliminar($id){
        $xEliAlumnos = Estudiante1::findOrFail($id);   
        $xEliAlumnos->delete();
        return back()->with('msj', 'Se elimino con exito!');

    }


    public function fnRegistrar(Request $request){

        $request -> validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $xNuevoAlumno = new Estudiante1;

        $xNuevoAlumno->codEst = $request->codEst;
        $xNuevoAlumno->nomEst = $request->nomEst;
        $xNuevoAlumno->apeEst = $request->apeEst;
        $xNuevoAlumno->fnaEst = $request->fnaEst;
        $xNuevoAlumno->turMat = $request->turMat;
        $xNuevoAlumno->semMat = $request->semMat;
        $xNuevoAlumno->estMat = $request->estMat;

        $xNuevoAlumno->save();

        return back()->with('msj', 'Registro exitoso');
    }


    public function fnLista(){
        $xAlumnos = Estudiante1::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor = $numero;
        $otro = 25;
        //return view('pagGaleria', ['valor' => $numero, 'otro' => 25]);
        return view('pagGaleria', compact('valor', 'otro'));
    }
}
