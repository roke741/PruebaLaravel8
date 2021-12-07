@extends('pagPlantilla')
@section('title')
    <h1 class="display-4"> Pagina de Lista </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{session('msj')}} </div>
    @endif
    <form action="{{route('Estudiante.xRegistrar')}}" method="post" class="d-grid gap-2">
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
    <tbody class="table-success">
    @foreach ($xAlumnos as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->codEst }}</td>
            <td>
                <a href="{{ route('Estudiante.xDetalle', $item->id) }}">
                {{ $item->apeEst }}, {{ $item->nomEst }}</a>
            </td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    X
                </button>
                    
                <!--form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">X</button>
                </form-->
                <!-- Modal Advertencia-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-blod text-danger" id="staticBackdropLabel">ADVERTENCIA</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Esta seguro de eliminar el registro?</h5>
                                <form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('Estudiante.xActualizar', $item->id) }}" class="btn btn-primary">Actualizar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <!-- elementos centrados con bootstrap-->
    <div class="d-flex justify-content-center">
    {{ $xAlumnos->links() }}
    </div>
@endsection