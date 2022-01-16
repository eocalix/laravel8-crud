Mostrar la lista de empleados
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->foto }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellido_paterno }}</td>
            <td>{{ $empleado->apellido_materno }}</td>
            <td>{{ $empleado->correo }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>