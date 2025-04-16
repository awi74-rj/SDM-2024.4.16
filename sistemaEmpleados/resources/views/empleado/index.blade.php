@extends('layouts.app')
@section('content')

<div class="container">

    <div class="alert alert-success alert-dismissible" role="alert">
        @if(Session::has('mensaje'))
                {{ Session::get('mensaje') }}

        @endif

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    


    

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
</div>
@endsection