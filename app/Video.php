<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table="videos";
    protected  $fillable=['ruta', 'ruta_thumbnail', 'titulo', 'descripcion', 'duracion', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User', 'id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function scopeSearch($query, $titulo){
        return $query->where('titulo', 'LIKE', "%$titulo%");

    }
    public function scopeSearchOwnVideos($query, $nombre){
        return $query->where('user_id', 'LIKE', "%$nombre%");
    }

}
