<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'brands';


    public $timestamps = true;
    protected $translationForeignKey = "brand_id";
    public $translatedAttributes = ['title'];
    public $translationModel = 'App\Models\Translation\Brand';


    protected $fillable = [
        'title',
    ];
}
