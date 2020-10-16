<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($photo){
            $cadena_url = $photo->url;
            $cadena_final = str_replace("/storage/", "", $cadena_url);
            Storage::disk('public')->delete($cadena_final);
        });

       /*  static::deleting(function($photo){
            Storage::disk('public')->delete($photo->url);
        }); */
    }
}
