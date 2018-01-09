<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>FeiTube</title>
</head>
<body>
@include('navbar')
@include('jumbotron')
<div class="container">
    @foreach($videos as $video)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="/videillos/{{$video->ruta_thumbnail}}" alt="">
                <div class="caption">
                    <h4><a href="{{ route('reproducir.play', ['id' => $video->id]) }}">{{$video->titulo}}</a></h4>
                    <h5></h5>
                    <p>{{$video->descripcion}}</p>
                    <p><a href="{{route('videos.edit', ['id' => $video->id])}}" class="btn btn-info btn-xs" role="button">Editar</a> <a href="{{route('videos.destroy', ['id' => $video->id])}}" class="btn btn-default btn-xs" role="button">Eliminar</a></p>
                    <h5>{{$video->created_at->diffForHumans()}}</h5>
                    @foreach($video->tags as $tag)
                        <span class="label label-success">{{$tag->nombre}}</span>
                    @endforeach
                </div>
            </div>
        </div>

    @endforeach





</div>

</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>