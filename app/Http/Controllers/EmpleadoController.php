<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $datosEmpleado = request()->all();
        // $datosEmpleado = request()->except(['_token', 'enviar']);
        
        // Empleado::insert($datosEmpleado);

        if (!$request->has('nombre') || empty(trim($request->input('nombre')))) 
        {
            return response()->json('El nombre es obligatorio');
        }

        $empleado = new Empleado;

        $empleado->nombre = $request->input('nombre');
        $empleado->apellido_paterno = $request->input('apellido_paterno');
        $empleado->apellido_materno = $request->input('apellido_materno');
        $empleado->correo = $request->input('correo');

        //$empleado->foto = $request->file('foto')->getClientOriginalName();

        if ($request->hasFile('foto')) 
        {
            //$rutaFoto = $request->foto->store('uploads', 'public');
            //$empleado->foto = $rutaFoto;
            $empleado->foto = $request->file('foto')->store('uploads', 'public');
        }

        $empleado->save();

        return response()->json($empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Empleado $empleado)
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado');
    }
}
