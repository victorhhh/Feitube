<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('Trumbowyg/dist/ui/trumbowyg.css') }}">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>FeiTube</title>
</head>
<body>
@include('navbar')

{!! Form::open(['route'=>'importar.store', 'method'=>'POST', 'files'=>true]) !!}
<div class="container">


    <div class="form-group">
        {!! Form::label('XML', 'XML') !!}
        {!! Form::file('XML') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Importar', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}


</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('Trumbowyg/dist/trumbowyg.js') }}"></script>
<script src="{{ asset('js/override.js') }}"></script>
</html>