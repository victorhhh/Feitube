<div class="container">

@foreach($videos as $video)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="/videillos/{{$video->ruta_thumbnail}}" alt="">
                <div class="caption">
                    <h4 class="contenido"><a href="{{ route('reproducir.play', ['id' => $video->id]) }}" >{{$video->titulo}}</a></h4>
                    <p class="contenido">{{$video->descripcion}}</p>
                    <h5>{{$video->created_at->diffForHumans()}}</h5>
                    @foreach($video->tags as $tag)
                    <span class="label label-success">{{$tag->nombre}}</span>
                        @endforeach


                </div>
            </div>
        </div>

    @endforeach





</div>
