@extends('pagPlantilla')
@section('title')
    <h1 class="display-4"> Pagina de Lista </h1>
@endsection

@section('seccion')

    @if(session('msj'))
        <div class="alert alert-success">
            {{session('msj')}}
        </div>
    @endif

    <form action="{{route('Estudiante.xRegistrar')}}" method="post" class="d-grid gap-2">
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El codigo es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                El nombre es requerido
            </div>
        @enderror

        @if ($errors->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>Apellido</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>
        @endif
               

        <input type="text" name="codEst" placeholder="Codigo" value="{{old('codEst')}}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombre" value="{{old('nomEst')}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellido" value="{{old('apeEst')}}" class="form-control mb-2">
        <input type="text" name="fnaEst" placeholder="Fecha Nacimiento" value="{{old('fnaEst')}}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione una opcion</option>
            <option value="1">Turno Dia</option>
            <option value="2">Turno Noche</option>
            <option value="3">Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            @for ($i = 1; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione una opcion</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>

        <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>

    <hr>
    <h3>Lista </h3>

    <table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Apellidos y Nombres</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($xAlumnos as $item)
    <!-- <p> {{ $item->id }} - {{ $item->nomEst }} </p> -->
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->codEst }}</td>
            <td>
                <a href="{{ route('Estudiante.xDetalle', $item->id) }}">
                {{ $item->apeEst }}, {{ $item->nomEst }}
                </a>
            </td>
            <td>
                <a href="" class="btn btn-primary">Editar</a>
            </td>
        </tr>
    @endforeach
            
    </tbody>
    </table>
        


@endsection