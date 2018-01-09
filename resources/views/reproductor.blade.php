<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>FeiTube</title>
</head>
<body>
@include('navbar')
<div class="container">
<!--<iframe  height="315" src="/videillos/feitube_1512799935.mov" frameborder="0" allowfullscreen></iframe>-->
    <video width="600" height="410" controls="true">
        <source src="/videillos/{{$video->ruta}}" type="video/mp4">
        <source src="/videillos/{{$video->rutaAvi}}" type="video/x-msvideo">
        <source src="/videillos/{{$video->rutaMpeg}}" type="video/mpeg">
        <source src="/videillos/{{$video->rutaMkv}}" type="video/mkv">
    </video>
    <h1>{{ $video->titulo }}</h1>
    <h5>{{$video->created_at->diffForHumans()}}</h5>
    <p>{{ $video->descripcion }}</p>


</div>
</body>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>