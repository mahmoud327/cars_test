<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $table = "brand_translations";

    protected $fillable = ['title', 'brand_id', 'locale'];


    public $timestamps = true;
}
