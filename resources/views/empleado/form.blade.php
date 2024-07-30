Formulario que tendrá los datos en común con create y edit
<h1>{{ $modo }} empleado</h1>
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}" id="Nombre">
    <br>
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:''}}" id="ApellidoPaterno">
    <br>
    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:''}}" id="ApellidoMaterno">
    <br> 
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}" id="Correo">
    <br>

    <label for="Foto">Foto</label>
    @if(isset($empleado->foto))

    <img src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">
    @endif
    
    <input type="file" name="Foto" value="" id="Foto">
    <br>

    <label for="Enviar">Enviar</label>
    <input type="submit" value="{{ $modo }} empleado">

    <a href="{{ url('empleado/') }}">Regresar al inicio</a>