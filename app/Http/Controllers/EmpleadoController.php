<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\MimeTypes;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(1);
        return view('empleado.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto' => 'required|mimes:jpg,jpeg,png|max:10000'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos,$mensaje);


        $datosEmpleado = request()->except('_token');

        //Va al formulario de create.blade y revisa gracias al name='Foto' en el formulario
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        Empleado::insert($datosEmpleado);

       // return response()->json($datosEmpleado);
       return redirect('empleado')->with('Mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $empleado= Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('Foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpg,png,jpeg'];
            $mensaje=['foto.required'=>'La foto es requerida'];
        }


        $this->validate($request,$campos,$mensaje);

        $datosEmpleado = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $empleado= Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto); 
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);

        $empleado= Empleado::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));
        return redirect('/empleado')->with('Mensaje','Empleado modificado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $empleado= Empleado::findOrFail($id);
        if( Storage::delete('public/'.$empleado->foto)){
            Empleado::destroy($id);
        }
        return redirect('/empleado')->with('Mensaje','Empleado Borrado con éxito');
    }
}
