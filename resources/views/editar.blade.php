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

{!! Form::open(['route'=>['videos.update', $video], 'method'=>'PUT']) !!}
<div class="container">
    <div class="form-group">
        {!! Form::label('titulo', 'Titulo') !!}
        {!! Form::text('titulo', $video->titulo, ['class'=>'form-control', 'placeholder'=>'Titulo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion', 'Descripción') !!}
        {!! Form::textarea('descripcion', $video->descripcion, ['class'=>'form-control text-content', 'placeholder'=>'Descripción', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Tags') !!}
        {!! Form::select('tags[]', $tags,  $my_tags, ['class'=>'form-control select-tag', 'multiple', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
<div class="container">
    <div class="progress">
        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span class="sr-only">20% Complete</span>
            20%
        </div>
    </div>
</div>

</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('Trumbowyg/dist/trumbowyg.js') }}"></script>
<script src="{{ asset('js/override.js') }}"></script>
</html>