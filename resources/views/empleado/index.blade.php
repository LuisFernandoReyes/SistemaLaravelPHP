Mostrar la lista de empleados

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
                <td> {{ $empleado->foto }} </td>
                <td> {{ $empleado->Nombre }} </td>
                <td> {{ $empleado->ApellidoPaterno }} </td>
                <td> {{ $empleado->ApellidoPaterno }} </td>
                <td> {{ $empleado->correo }} </td>
                <td> Editar | Borrar</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>