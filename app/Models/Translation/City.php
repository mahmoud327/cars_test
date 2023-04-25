<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = "city_translations";

    protected $fillable = ['title', 'city_id', 'locale'];


    public $timestamps = true;
}
