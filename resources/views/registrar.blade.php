<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>FeiTube</title>
</head>
<body>
@include('navbar')

    {!! Form::open(['route'=>'usuarios.store', 'method'=>'POST']) !!}
<div class="container">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'nombre completo', 'required']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo electronico') !!}
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'email', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'password', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
    {!! Form::close() !!}


</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>