<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'cities';


    public $timestamps = true;
    protected $translationForeignKey = "city_id";
    public $translatedAttributes = ['title'];
    public $translationModel = 'App\Models\Translation\City';


    protected $fillable = [
        'title',


    ];



}
