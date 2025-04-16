    <h1>{{$modo}} empleado</h1>

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach( $errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

 
    <div class="form-group">
        <label for="nombre"> Nombre: </label>
            <input type="text" class="form-control" name="nombre" value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre')}}" id="nombre">
    </div>

    <div class="from-group">
        <label for="apellido_paterno"> Apellido 1: </label>
            <input type="text" class="form-control" name="apellido_paterno" value="{{isset($empleado->apellido_paterno)?$empleado->apellido_paterno:old('apellido_paterno') }}" id="apellido_paterno">
    </div>

    <div class="from-group">
        <label for="apellido_materno"> Apellido 2: </label>
            <input type="text" class="form-control" name="apellido_materno" value="{{ isset($empleado->apellido_materno)?$empleado->apellido_materno:old('apellido_materno') }}" id="apellido_materno">
    </div>

    <div class="from-group">
     <label for="correo"> Correo </label>
        <input type="text" class="form-control" name="correo" value="{{ isset($empleado->correo)?$empleado->correo:old('correo') }}" id="correo">
    </div>

    <br>
    <div class="from-group">
        <label for="foto"> Foto de perfil: </label>
        <br>
        @if(isset($empleado->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">
        @endif
        <input type="file" class="form-control" name="foto" id="foto">
    </div>

    <input class="btn btn-success" type="submit" value="{{$modo}} Datos">
        
    <a class="btn btn-primary" href="{{ url('empleado/') }}"> Regresar </a>


    <br>
    