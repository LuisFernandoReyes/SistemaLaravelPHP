Formulario que tendrá los datos en común con create y edit

<label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" value="{{ $empleado->Nombre }}" id="Nombre">
    <br>
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" value="{{ $empleado->ApellidoPaterno}}" id="ApellidoPaterno">
    <br>
    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" value="{{ $empleado->ApellidoMaterno}}" id="ApellidoMaterno">
    <br> 
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" value="{{ $empleado->Correo }}" id="Correo">
    <br>

    <label for="Foto">Foto</label>
    <img src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">

    <input type="file" name="Foto" value="" id="Foto">
    <br>

    <label for="Enviar">Enviar</label>
    <input type="submit" value="Guardar Datos">