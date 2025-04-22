@extends('layouts.app')
@section('content')

<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
         {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    
    <a href="{{ url('empleado/create') }}" class="btn btn-success"> Registrar nuevo empleado </a>
    <br>
    <br>
    <table class="table table-light">
        
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>foto</th>
                <th>nombre</th>
                <th>apellido_paterno</th>
                <th>apellido_materno</th>
                <th>correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($empleados as $empleados)
            <tr>
                <td>{{$empleados->id}}</td>

                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleados->foto }}" width="100" alt="">
                    
                </td>


                <td>{{$empleados->nombre}}</td>
                <td>{{$empleados->apellido_paterno}}</td>
                <td>{{$empleados->apellido_materno}}</td>
                <td>{{$empleados->correo}}</td>
                <td>
                    <a href="{{ url('/empleado/'.$empleados->id.'/edit' ) }}" class="btn btn-warning" >
                        Editar
                    </a>
                    |
                    
                    <form action="{{ url('/empleado/'.$empleados->id ) }}"  class="d-inline" method="post">
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Desea borrar el elemento?')" value="Borrar">
                            @csrf
                            {{ method_field('DELETE') }}
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        
    </div>

</div>
@endsection