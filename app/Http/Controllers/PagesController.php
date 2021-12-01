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
        $xAlumnos = Estudiante1::all();
        return view('PagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor = $numero;
        $otro = 25;
        //return view('pagGaleria', ['valor' => $numero, 'otro' => 25]);
        return view('pagGaleria', compact('valor', 'otro'));
    }
}
