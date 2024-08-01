@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('Mensaje'))
    {{Session::get('Mensaje')}}
    @endif
    <a href="{{ url('/empleado/create') }}" class="btn btn-success">Registrar nuevo usuario</a>
<br><br>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fotografia</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr>
                    <td> {{ $empleado->id }} </td>

                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" alt="" width="100">

                    </td>


                    <td> {{ $empleado->Nombre }} </td>
                    <td> {{ $empleado->ApellidoPaterno }} </td>
                    <td> {{ $empleado->ApellidoPaterno }} </td>
                    <td> {{ $empleado->correo }} </td>
                    <td>

                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }} " class="btn btn-warning">
                            Editar
                        </a>

                        <form action="{{ url('/empleado/'.$empleado->id ) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar este registro?')" value="borrar">

                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection