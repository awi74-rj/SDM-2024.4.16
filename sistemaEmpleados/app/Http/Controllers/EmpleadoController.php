<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * listaer
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(10); //10 primeros registros de empleados
        return view('empleado.index', $datos);
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
    public function store(Request $request)//recibe toda la info antes de enviarla 
    {
        //
        
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido_paterno'=>'required|string|max:100',
            'apellido_materno'=>'required|string|max:100',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];
    
        $this->validate($request, $campos,$mensaje);


        //$datosEmpleado = request()->all();//recepta todos los datos enviados a store
        $datosEmpleado = request()->except('_token'); //sin la llave de seguridad del nombre
        

        //adjuntando un archivo en la base
        if($request->hasFile('foto')){
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }
        
        Empleado::insert($datosEmpleado);

        //return response()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Empleado agregado con exito');
        //return redirect()->route('empleado')->with('mensaje', 'Empleado agregado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrfail($id);//se toma el id en la url

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido_paterno'=>'required|string|max:100',
            'apellido_materno'=>'required|string|max:100',
            'correo'=>'required|email',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.required'=>'La foto es requerida'];
        }
    
        $this->validate($request, $campos,$mensaje);

        $datosEmpleado = request()->except(['_token', '_method']);
        
        if($request->hasFile('foto')){
            $empleado=Empleado::findOrfail($id);
            Storage::delete(['public/'.$empleado->foto]);

            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }


        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrfail($id);//se toma el id en la url

        //return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje', 'Datos Actualizados');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $empleado=Empleado::findOrfail($id);

        if(Storage::delete('public/'.$empleado->foto)){

            Empleado::destroy($id);

        }

        Empleado::destroy($id);

        return redirect('empleado')->with('mensaje', 'Empleado Borrado');
    }
}
