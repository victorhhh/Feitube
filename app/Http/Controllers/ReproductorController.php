<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReproductorController extends Controller
{
    //
    public function __construct()
    {
        Carbon::setLocale('es');
    }
    public function index($id){
        $video = Video::find($id);
        //dd($video);

        return view('reproductor')->with('video', $video);


    }
}
