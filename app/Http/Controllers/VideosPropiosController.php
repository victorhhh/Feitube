<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Video;
use Carbon\Carbon;

class VideosPropiosController extends Controller
{
    //
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index($user_id){

        $videos = Video::SearchOwnVideos($user_id)->orderBy('id', 'DESC')->paginate(100);
        $videos->each(function ($videos){
            $videos->user;
            $videos->tags;
        });
        //dd($videos);
        return view('propios')->with('videos', $videos);
    }
    public function recientes(){

        $videos = Video::orderBy('created_at', 'DESC')->paginate(100);
        $videos->each(function ($videos){
            $videos->user;
            $videos->tags;
        });

        return view('welcome')->with('videos', $videos);
    }

}
