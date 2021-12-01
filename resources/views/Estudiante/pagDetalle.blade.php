@extends('pagPlantilla')
@section('title')
    <h1 class="display-4"> Pagina de Lista </h1>
@endsection

@section('seccion')
    <h3>Detalle: </h3>

    <p>ID:                  {{$xDetAlumnos->id}}     </p>
    <p>Codigo:              {{$xDetAlumnos->codEst}} </p>
    <p>Nombre:              {{$xDetAlumnos->nomEst}} </p>
    <p>Apellido:            {{$xDetAlumnos->apeEst}} </p>
    <p>Fecha de Nacimiento: {{$xDetAlumnos->fnaEst}} </p>
    <p>Turno:               {{$xDetAlumnos->turMat}} </p>
    <p>Semestre:            {{$xDetAlumnos->semMat}} </p>
    <p>Estado de matric.:   {{$xDetAlumnos->estMat}} </p>
        

@endsection