<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Video;
use Carbon\Carbon;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use FFMpeg\Format\FormatInterface;
use FFMpeg\Format\Video\Ogg;
use FFMpeg\Format\Video\WebM;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class VideoController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //dd($request->name);
        $videos = Video::Search($request->name)->orderBy('id', 'DESC')->paginate(100);
        $videos->each(function ($videos){
            $videos->user;
        });
        //dd($videos);


        return view('welcome')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tag = Tag::all()->pluck('nombre', 'id');


        return view('subir')->with('tags', $tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {



        //dd($request->tags);

        if ($request->file('video')){
            $file = $request->video;


            //guardar videos manipular archivos


            $nombre = 'feitube_' . time() . '.' .$file->getClientOriginalExtension();
            $nombreGif = 'feitube_' . time() . '.gif';
            $nombreAvi = 'feitube_' . time() . '.avi';
            $nombreMpeg = 'feitube_' . time() . '.mpeg';
            $nombreMkv = 'feitube_' . time() . '.mkv';
            $nombreMp4 = 'feitube_' . time() . '.mp4';
            $path = public_path() . '/videillos/';
            $file->move($path, $nombre);





            $ffmpeg = FFMpeg::create();
            $convertido = $ffmpeg->open($path.$nombre);
            $convertido->gif(TimeCode::fromSeconds(20), new Dimension(640, 480), 4)->save($path.$nombreGif);
            $extension = $file->getClientOriginalExtension();
            switch ($extension){
                case 'avi':
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMpeg);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMkv);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMp4);
                    break;
                case 'mpeg':
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreAvi);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMkv);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMp4);
                    break;
                case 'mkv':
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreAvi);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMpeg);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMp4);
                    break;
                case 'mp4':
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreAvi);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMpeg);
                    exec("ffmpeg -i ".$path.$nombre." ".$path.$nombreMkv);
                    break;


            }





        }


        $video = new Video();
        $video->ruta = $nombre;
        $video->rutaAvi = $nombreAvi;
        $video->rutaMpeg = $nombreMpeg;
        $video->rutaMkv = $nombreMkv;
        $video->ruta_thumbnail = $nombreGif;
        $video->titulo = $request->titulo;
        $video->descripcion = $request->descripcion;
        $video->duracion = 10;
        $video->reproducciones = 0;
        $video->tipo = 1;
        $video->user_id = Auth::id();
        $video->save();

        $video->tags()->sync($request->tags);



        Flash::success('El video '. $video->titulo . ' se ha subido');
        return redirect()->route('principal');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //

        $tags = Tag::all()->pluck('nombre', 'id');
        $my_tags = $video->tags->pluck('id')->ToArray();

        return view('editar')->with('tags', $tags)->with('my_tags', $my_tags)->with('video', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //

        $video->fill($request->all());
        $video->save();

        $video->tags()->sync($request->tags);
        Flash::success("Se ha editado el video");
        return redirect()->route('principal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //



        Flash::success("Se ha editado el video");
        return redirect()->route('principal');
    }
}
