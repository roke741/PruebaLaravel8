@extends('pagPlantilla')
@section('title')
    <h1 class="display-4"> Pagina de Actualizar </h1>
@endsection

@section('seccion')
    <h3>Detalle: </h3>

    @if(session('msj'))
        <div class="alert alert-success">
            {{session('msj')}} </div>
    @endif
    <form action="{{route('Estudiante.xUpdate', $xActAlumnos->id)}}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf
        @error('codEst')
            <div class="alert alert-danger">
                El codigo es requerido </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                El nombre es requerido</div>
        @enderror

        @if ($errors->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>Apellido</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>
        @endif
        
        <input type="text" name="codEst" placeholder="Codigo" value="{{ $xActAlumnos->codEst }}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombre" value="{{ $xActAlumnos->nomEst }}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellido" value="{{ $xActAlumnos->apeEst }}" class="form-control mb-2">
        <input type="text" name="fnaEst" placeholder="Fecha Nacimiento" value="{{ $xActAlumnos->fnaEst }}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2" >
            <option value="">Seleccione una opcion</option>
            <option value="1" @if ($xActAlumnos->turMat == 1) {{ "SELECTED" }} @endif>Turno Dia</option>
            <option value="2" @if ($xActAlumnos->turMat == 2) {{ "SELECTED" }} @endif>Turno Noche</option>
            <option value="3" @if ($xActAlumnos->turMat == 3) {{ "SELECTED" }} @endif>Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            @for ($i = 1; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->semMat == $i) {{ "SELECTED" }} @endif> Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione una opcion</option>
            <option value="1" @if ($xActAlumnos->estMat == 1) {{ "SELECTED" }} @endif >Activo</option>
            <option value="2" @if ($xActAlumnos->estMat == 2) {{ "SELECTED" }} @endif >Inactivo</option>
        </select>

        <button type="submit" class="btn btn-success mb-2">Actualizar</button>
    </form>
        

@endsection